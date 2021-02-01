<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        return view('addproduct');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name'=>'required',
            'price'=>'required|integer',
            'stock'=>'required|integer',
            'image'=>'required|image|mimes:png,jpg'
        ]);

        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $path = public_path('uplodedimgs');
        $image -> move($path,$imageName);
        Product::create([
            'name'=> $request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'path'=>'/uplodedimgs/'.$imageName
        ]);

        return redirect()->route('shop');
    }
}
