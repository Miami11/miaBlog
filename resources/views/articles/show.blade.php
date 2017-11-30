<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{ $article->title }}
{{ $article->description }}

<a href="{{ route('articles.edit', $article->id) }}">edit</a>
<form action="{{ route('articles.destroy', $article->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button type="submit">Delete</button>
</form>
</body>
</html>