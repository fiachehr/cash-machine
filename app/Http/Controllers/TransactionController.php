<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a transaction detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function transaction($id)
    {
        $data = Transaction::find($id);
        $total = Transaction::sum('amount');
        return view('transaction',compact('data','total'));
    }

}
