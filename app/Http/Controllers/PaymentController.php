<?php

namespace App\Http\Controllers;

use App\Mail\Order;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        return view('payment');
    }

    public function store(Request $request)
    {
        $orders = Cart::where('user_id',auth()->user()->id)->get();
        foreach($orders as $order)
        {
            $stock = Product::where('id', $order->product_id)->get();
            $stock[0]->stock = $stock[0]->stock - $order->quantity;
            $stock[0]->save();
        }

        $this->validate($request,[
            'cardname'=>'required',
            'number'=> 'required|integer|digits:11',
            'cvc'=>'required|digits:3',
            'date'=>'required|date'
        ]);

        Payment::create([
            'cardname'=> $request->cardname,
            'number'=> $request->number,
            'cvc'=>$request->cvc,
            'address'=>$request->address,
            'date'=> $request->date
        ]);

        $userProducts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($userProducts as $userProduct)
        {
            $userProduct->delete();
        }

        $user = auth()->user();
        Mail::to($user)->send(new Order($user));

        return redirect()->route('shop')->with('paymentSuccess','Payment Successfull');
    }

}
