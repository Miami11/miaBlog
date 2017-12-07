@extends('layouts.app')

@section('content')
<form action="{{ route('articles.update', $article->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    <input type="text" name="title" value="{{ $article->title }}">
    <input type="text" name="description" value="{{ $article->description }}">
    <button type="submit">Submit</button>
</form>

@endsection