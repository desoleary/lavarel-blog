@extends('layouts.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h1>Publish a post</h1>

        @include('partials.errors')

        <form method="POST" action="/posts">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
@endsection
