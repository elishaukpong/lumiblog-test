<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome',['posts' => Post::limit(6)->get()]);
    }

    public function posts()
    {
        return view('posts.index',['posts' => Post::paginate(15)]);
    }

    public function show($id)
    {
        return view('posts.show',['post' => Post::findOrFail($id)]);
    }
}
