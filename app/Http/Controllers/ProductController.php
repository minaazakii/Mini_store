<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $user=auth()->user();
        $products = Product::all();
        return view('shop',[
            'products'=>$products,
            'user'=>$user
        ]);
    }

    public function show(Request $request,Product $product)
    {
        return view('showProduct',[
            'product'=>$product,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name','LIKE','%'.$search.'%')->get();
        return view('search',[
            'products'=>$products
        ]);
    }

    public function add(Request $request,Product $product)
    {
        $user = auth()->user();
        $cart = Cart::where('user_id',$user->id);
        $cartCount = $cart->count();
        $cart->totalPrice = ($product->price) * ($request->quantity);
        Cart::create([
            'user_id'=>$user->id,
            'product_id'=>$product->id,
            'quantity'=>$request->quantity,
            'totalPrice' => $cart->totalPrice
        ]);

        return redirect()->route('shop.show',$product)->with('cartSuccess','Item Added Successfully');
    }

    public function checkout()
    {
        $user = auth()->user();
        $products = Cart::where('user_id',$user->id)->get();
        $totalprice=0;
        $counter = 0;
        $findProduct = [];
        $carts = [];
        //Check if there is products in the Cart
        if(empty($products))
        {
            $products=[];
        }else
        {
            foreach($products  as $product)
            {
                $carts[] = $product;
            }

            //To get The Total Price of the cart
            foreach($carts as $cart)
            {
                $totalprice = $totalprice + $cart['totalPrice'];
            }

            //To find each Product info
            foreach($products as $product)
            {
                $findProduct[] = Product::find($product->product_id);
            }
        }
        return view('cart',[
            'products' =>$findProduct,
            'carts'=>$carts,
            'i'=>$counter,
            'totalprice'=>$totalprice
        ]);
    }
}
