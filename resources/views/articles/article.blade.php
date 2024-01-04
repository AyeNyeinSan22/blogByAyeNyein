@extends('layouts.app')
@section('content')
    <div class="container" >
        {{ $articles->links() }}

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif
         @foreach ($articles as $article )
             <div class="card mb-2">
                <div class="card-body">
                    <div class="card-title text-primary">{{ $article->title }}</div>
                    <div class="card-subtitle text-muted mb-2 small">{{ $article->created_at->diffForHumans() }}
                        <b>Category: {{ $article->category->name }}</b>
                    </div>
                    <p class="card-text">
                        {{ $article->body }}
                    </p>
                    <a class="card-link btn btn-success" href="{{ url("/articles/detail/$article->id") }}">View Details &raquo;</a>
                </div>
             </div>
         @endforeach
    </div>
@endsection
