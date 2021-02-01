<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest'])->except(['logout']);
    }

    public function index()
    {
        return view('auth.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($request->only('username','password')))
        {
            return redirect()->route('login.index')->with('loginError','Wrong Username or Password');
        }else
        {
            return redirect()->route('shop');
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login.index');
    }
}
