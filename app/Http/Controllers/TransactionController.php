<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display A Transaction Detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function transaction($id)
    {
        $data = Transaction::find($id);
        $total = Transaction::sum('amount');
        return view('transaction',compact('data','total'));
    }

     /**
     * Display Transactions List.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Transaction::all();
        return view('list',compact('data'));
    }

}
