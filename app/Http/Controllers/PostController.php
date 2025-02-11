<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function __construct() 
    {
        // ...

        $this->middleware('auth');
    }
    public function index(User $user)
    {

        $posts = Post::where('user_id', $user->id)->paginate(20);
        
        return view('dashboard',[
            'user' => $user,
            'posts'=> $posts
        ]);
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        Validator::validate($request->all(), [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        // Post::create([
        //     'titulo'=> $request->titulo,
        //     'descripcion'=> $request->descripcion,
        //     'imagen'=> $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);

        $request->user()->posts()->create([
            'titulo'=> $request->titulo,
            'descripcion'=> $request->descripcion,
            'imagen'=> $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }
}


