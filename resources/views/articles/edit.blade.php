@extends('layouts.app')
@section('content')
    <div class="container mb-3">


        @if($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif


        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ $article->title }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Body</label>
                <textarea name="body"  class="form-control">{{ $article->body }}</textarea>
            </div>

            <div class="mb-3">
                <label for="">Category</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $category)

                        <option value="{{ $category->id }}"
                            @if ($article->category_id === $category->id)
                             selected
                            @endif >
                            {{ $category->name }}
                        </option>



                    @endforeach
                </select>
            </div>

            <input type="submit" value="Edit Article" class="btn btn-warning">
        </form>
    </div>
@endsection
