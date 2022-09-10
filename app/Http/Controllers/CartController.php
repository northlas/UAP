<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Game;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $carts = auth()->user()->cart;
        $total = 0;

        foreach ($carts as $cart) {
            $total += $cart->game->price;
        }

        return view('main.cart', [
            'carts' => $carts,
            'total' => $total,
            'page' => 'cart',
        ]);
    }

    public function add(Game $game){
        $cart = new Cart();
        $cart->user_id= auth()->user()->id;
        $cart->game_id = $game->id;
        $cart->save();

        return redirect()->back();
    }

    public function remove(Cart $cart){
        $cart->delete();

        return redirect()->back();
    }

    public function checkout(){
        $carts = auth()->user()->cart;

        foreach($carts as $cart){
            $transaction = new Transaction();
            $transaction->user_id = $cart->user_id;
            $transaction->game_id = $cart->game_id;
            $transaction->save();

            $cart->delete();
        }

        return redirect()->back();
    }
}
