@extends('layouts.app')

@section('content')
    <main role="main">

        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>{{ $article->title }}</h1>
            <p class="lead">{{ $article->description }}</p>
            <a class="btn btn-primary" role="button"  href="{{ route('articles.edit', $article->id) }}">edit</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button class="btn btn-md btn-danger" type="submit">Delete</button>
            </form>

        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Leave a message</h2>
                <form action="{{ route('comments.post') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $article->id }}" name="article_id">
                    <input type="text" name="tag" placeholder="#tag">
                    <input type="text" name="text">
                    <button class="btn btn-md btn-success" type="submit">Submit</button>

                </form>
            </div>
        </div>
    </main>




@endsection