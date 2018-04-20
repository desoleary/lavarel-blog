@extends('layouts.master')

@section('content')
    <div class="col-md-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">
                {{ $post->title }}
            </h2>
            @if(count($post->tags))
                <ul>
                    @foreach($post->tags as $tag)
                        <li><a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            @endif

            {{$post->body}}
        </div>

        @if($post->comments()->exists())
            <ul class="list-group">
                @foreach($post->comments()->get() as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{ $comment->created_at->diffForHumans() }} : &nbsp;
                        </strong>
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>
            <hr>
        @endif

        @include('partials.errors')

        <div class="card">
            <div class="card-body">
                <form action="/posts/{{ $post->id }}/comments" method="post">
                    ﻿{{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Your comment here." required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection