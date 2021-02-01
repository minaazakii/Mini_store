<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function edit(Request $request , Cart $cart)
    {
        $product = Product::where('id',$cart->product_id)->get();
        //Remove Product If Quantitu Equal To Zero
        if($request->quantity > '0' )
        {
            $cart->quantity = $request->quantity;
            $cart->totalPrice = ($product[0]->price)*($request->quantity);
            $cart->save();
        }else
        {
            $cart->delete();
        }

        return redirect()->route('checkout');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('checkout');
    }
}
