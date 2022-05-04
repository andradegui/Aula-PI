<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(){
        $itens = Cart::where('user_id', Auth()->user()->id)->get();
        return view('cart.index')->with('itens', $itens);
    }
}
