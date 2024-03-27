@extends('layouts.app')

@section('titulo')
    Crear Post
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">

       
        <form action="{{ route('imagenes.store') }}" method="POST" id="dropzone" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:0">
        <form action="{{ route('posts.store') }}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label 
                for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                <input 
                id="titulo" 
                name="titulo" 
                type="text"
                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" placeholder="Titulo de la publicacion"
                value="{{old('titulo')}}"
                />
            </div>
            @error('titulo')
                <div class="bg-red-500 p-2 text-white text-sm text-center rounded-lg mb-5">{{$message}}</div>
            @enderror
            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">descripcion</label>
                <textarea 
                id="descripcion" 
                name="descripcion" 
                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" placeholder="Descripcion">
                {{old('descripcion')}}
                </textarea>
                @error('descripcion')
                <div class="bg-red-500 p-2 text-white text-sm text-center rounded-lg mb-5">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-5">
                <input 
                    name="imagen" 
                    type="hidden"
                    value="{{old('imagen')}}"
                />
                @error('imagen')
                <div class="bg-red-500 p-2 text-white text-sm text-center rounded-lg mb-5">{{$message}}</div>
                @enderror
            </div>
            
            <input type="submit" value="Publicar"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 w-full rounded-lg cursor-pointer"/>
        </form>
    </div>
</div>
@endsection