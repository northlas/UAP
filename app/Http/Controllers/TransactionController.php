<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function checkout(){
        $transaction = Transaction::with('game')->where('user_id', auth()->user()->id)->get();

        return response([
            'message' => 'Success',
            'data' => $transaction,
        ]);
    }
}
