<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts) // Dependency injection
    {
        $posts = $posts->filter(request(['month', 'year']));

        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        $user_id = auth()->user()->id;

        Post::create(array_merge(request(['title', 'body']), compact('user_id')));

        return redirect()->home();
    }
}
