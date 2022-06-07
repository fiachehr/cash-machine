<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardTransactionRequest;
use App\Models\Transaction;
use Carbon\Carbon;

class CardTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('card');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardTransactionRequest $request)
    {
        $data['data'] = json_encode($request->except('_token'));
        $data['type'] =  'cc';
        $data['amount'] = $request->input('amount');
        $data['ts_register'] = Carbon::now()->timestamp;
        $transaction = Transaction::create($data);
        return redirect()->to(route('transaction',$transaction->id));
    }

}
