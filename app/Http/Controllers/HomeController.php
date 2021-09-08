<?php

namespace App\Http\Controllers;

use App\Contracts\PostInterface;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(PostInterface $post)
    {
        $this->postRepository = $post;
    }

    public function index()
    {
        return view('welcome',['posts' => $this->postRepository->builder()->limit(3)->get()]);
    }

    public function posts()
    {
        return view('posts.index',['posts' => $this->postRepository->paginate(15)]);
    }

    public function show($id)
    {
        return view('posts.show',['post' => $this->postRepository->findOrFail($id)]);
    }
}
