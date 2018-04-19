<?php

namespace App\Http\Controllers;

use App\Post;

class CommentsController extends Controller
{
    public function store(Post $post) {
        $this->validate(request(), [
            'body' => 'required|min:2'
        ]);

        $post->comments()->create(request(['body']));

        return back();
    }
}
