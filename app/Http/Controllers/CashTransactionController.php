<?php

namespace App\Http\Controllers;

use App\Http\Requests\CashTransactionRequest;
use App\Models\Transaction;
use Carbon\Carbon;

class CashTransactionController extends Controller
{
    /**
     * Display Cash Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cash');
    }

    /**
     * Store Cash Resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CashTransactionRequest $request)
    {
        $data['data'] = json_encode($request->except('_token'));
        $data['type'] =  'cm';
        $data['amount'] = $request->input('amount');

        if($request->input('correct-amount') != null){

            $data['amount'] = $request->input('correct-amount');
        }
        $data['ts_register'] = Carbon::now()->timestamp;
        $transaction = Transaction::create($data);
        return redirect()->to(route('transaction',$transaction->id));
    }

}
