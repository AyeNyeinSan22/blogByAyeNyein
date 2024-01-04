@extends('layouts.app')
@section('content')
    <div class="container">

        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title text-primary">{{ $article->title }}</div>
                <div class="card-subtitle text-muted small mb-2">
                    {{ $article->created_at->diffForHumans() }}
                    <b>{{ $article->category->name }}</b>
                </div>
                <p class="card-text">{{ $article->body }}</p>

                  <a href="{{ url("/articles/delete/$article->id") }}" class="card-link btn btn-danger">Delete</a>
                  <a href="{{ url("/articles/edit/$article->id") }}" class="btn btn-warning">Edit</a>


            </div>
        </div>

        <ul class="list-group mb-3">
            <li class="list-group-item active">
               <b> Comments : ({{ count($article->comments) }})</b>
            </li>
            @foreach ($article->comments as $comment)
              <li class="list-group-item">
                {{ $comment->content }} <br>

                 <small>By {{ $comment->user->name }} {{ $comment->created_at->diffForHumans() }}</small>
                 <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end"></a>

             </li>
            @endforeach
        </ul>

        <form action="{{ url("/comments/add") }}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" class="form-control mb-2"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-secondary">
        </form>


    </div>
@endsection
