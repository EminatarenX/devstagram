@extends('layouts.app')

@section('titulo')
Registrate en DevStagram
@endsection

@section('contenido')
    <div class ="md:flex  md:gap-10 md:items-center">
        <div class="flex  md:w-6/12">
            <img src="{{asset('img/registrar.jpg')}}" alt="imagen-registro" cl/>
        </div>

        <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label 
                    for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input 
                    id="name" 
                    name="name" 
                    type="text"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" placeholder="Tu nombre"
                    value="{{old('name')}}"
                    />
                </div>
                @error('name')
                    <div class="bg-red-500 p-2 text-white text-sm text-center rounded-lg mb-5">{{$message}}</div>
                @enderror
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input 
                    id="username" 
                    name="username" 
                    type="text"
                    value="{{old('username')}}"
                    class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" placeholder="Tu nombre de usuario"/>
                </div>
                @error('username')
                <div class="bg-red-500 p-2 text-white text-sm text-center rounded-lg mb-5">{{$message}}</div>
            @enderror
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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="border p-3 w-full rounded-lg" placeholder="Repetir password"/>
                </div>
                @error('password_confirmation')
                <div class="bg-red-500 p-2 text-white text-sm text-center rounded-lg mb-5">{{$message}}</div>
            @enderror
                <input type="submit" value="Crear cuenta"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 w-full rounded-lg cursor-pointer"/>
            </form>
        </div>

    </div>
@endsection