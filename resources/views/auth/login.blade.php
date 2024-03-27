@extends('layouts.app')

@section('titulo')
Inicia Sesion en DevStagram
@endsection

@section('contenido')
    <div class ="md:flex  md:gap-10 md:items-center">
        <div class="flex  md:w-6/12">
            <img src="{{asset('img/login.jpg')}}" alt="imagen-login" cl/>
        </div>

        <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login')}}" method="POST" novalidate>
                @csrf
              
                @if(session('mensaje'))
                    <div class="bg-red-500 p-2 text-white text-sm text-center rounded-lg mb-5">{{session('mensaje')}}</div>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input 
                    id="email" 
                    name="email" 
                    type="email"
                    value="{{old('email')}}"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" placeholder="Email de registro"/>
                </div>
                @error('email')
                <div class="bg-red-500 p-2 text-white text-sm text-center rounded-lg mb-5">{{$message}}</div>
            @enderror
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input id="password" name="password" type="password" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" placeholder="Password de registro"/>
                </div>
                @error('password')
                <div class="bg-red-500 p-2 text-white text-sm text-center rounded-lg mb-5">{{$message}}</div>
            @enderror

                <div class="mb-5">
                    <input id="remember" name="remember" type="checkbox" class="mr-2"/>
                    <label for="remember" class="mb-2  text-gray-500 font-bold">Recordar sesion</label>
                </div>

                <input type="submit" value="Iniciar sesion"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 w-full rounded-lg cursor-pointer"/>
            </form>
        </div>

    </div>
@endsection