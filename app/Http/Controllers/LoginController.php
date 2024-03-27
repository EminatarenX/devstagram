<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller{
    public function index()
    {
        return view('auth.login');
    }    
    public function store(Request $request) 
    {
     

            Validator::validate($request->all(), [
                'email'=>'required|email',
                'password'=>'required',
            ]);
           
            if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
                return back()->with('mensaje', 'Credenciales incorrectas');
            }
            
            return redirect()->route('posts.index', auth()->user()->username);
    }
}