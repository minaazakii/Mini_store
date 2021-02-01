<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function index()
    {
        return view('auth.adminRegister');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=> 'required',
            'password'=> 'required|confirmed',
            'email'=> 'required|email|confirmed',
            'phone'=>'required|digits:11'
        ]);

        User::create([
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'email'=>$request->email,
            'phone'=>$request->phone,
            'role_id'=>'1'
        ]);
        return redirect()->route('login.index');
    }
}
