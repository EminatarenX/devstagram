<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //
    public function index(){
        return view("auth.register");
    }

    public function store(
        Request $request
    )
    {
        //validacion
        $request->request->add(['username' => Str::slug($request->username)]);
        // ...

        Validator::validate($request->all(), [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|email|unique:users|email|max:60',
            'password'=> 'required|confirmed|min:6',
        ]);

        User::create([
            'name'=> $request->name,
            'username'=> $request->username ,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
