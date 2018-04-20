<?php

namespace App\Repositories;

use App\Post;

class Posts {
    public function filter($filters)
    {
        return Post::latest()
            ->filter($filters)
            ->get();

        return Post::all(); # Simple example, normally this would much more complicated SQL
    }
}