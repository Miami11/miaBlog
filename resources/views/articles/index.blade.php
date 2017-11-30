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
@foreach($articles as $article)
    <a href="{{ route('articles.show', $article->id) }}"><h1> {{ $article->title }}</h1></a>
@endforeach
{{--<h1>{{ $articles }}</h1>--}}
</body>
</html>