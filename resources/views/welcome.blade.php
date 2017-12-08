<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--{{ HTML::style('css/app.css'); }}--}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}">

    {{--<link rel="stylesheet" type="text/css" href="css/app.css"/>--}}
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<h2 class="song">hi</h2>
{{--<ul>--}}
{{--<li>{{ $users->implode('name',',') }}</li>--}}
{{--</ul>--}}
{{--// 等於下面--}}
{{--@foreach($users as $user)--}}
    {{--{{ $user->name }}{{ $loop->remaining ? ',' : '' }}--}}
{{--@endforeach--}}

{{--@foreach($users as $user)--}}

{{--<li class="{{ $loop->first ? 'first' : '' }}">{{ $user->name }}</li>--}}
{{--@endforeach--}}

{{--@foreach($users->chunk(4) as $userSet)--}}
{{--<div class="row">--}}
{{--@foreach($userSet as $user)--}}

{{--@endforeach--}}
{{--</div>--}}
{{--@endforeach--}}

</body>
</html>
