<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankTransactionRequest;
use App\Models\Transaction;
use Carbon\Carbon;

class BankTransactionController extends Controller
{
    /**
     * Display Bank Transfer Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bank');
    }

    /**
     * Store Bank Transfer Source In Storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankTransactionRequest $request)
    {
        $data['data'] = json_encode($request->except('_token'));
        $data['type'] = 'bt';
        $data['amount'] = $request->input('amount');
        $data['ts_register'] = Carbon::now()->timestamp;
        $transaction = Transaction::create($data);
        return redirect()->to(route('transaction', $transaction->id));
    }
}
