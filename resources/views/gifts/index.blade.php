@extends('layouts.app')

@section('content')
    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Album example</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                    creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it
                    entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary">Main call to action</a>
                    <a href="#" class="btn btn-secondary">Secondary action</a>
                </p>
            </div>
        </section>

        <div class="album text-muted">
            <div class="container">

                <div class="row">
                    <ul>
                        <li><a href="{{ route('gift.wishList') }}">@lang('activity.type.list')</a></li>
                    </ul>

                    @foreach($gifts as $gift)
                        <form action="{{ route('gift.add') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="col-sm-4 text-center">
                                <img class="product" src="{{ asset($gift->path.'.jpeg') }}" alt="Card image cap">
                                <p class="card-text text-center"> Name:{{ $gift->name }}</p>
                                <p class="card-text text-center">Points:{{ $gift->points }}</p>
                                <button type="submit" class="btn btn-default">
                                    <input type="hidden" name="id" value="{{ $gift->id }}">
                                    <i class="fa fa-plus"></i> add to wish List
                                </button>
                            </div>
                        </form>
                    @endforeach

                </div>
            </div>

    </main>
@endsection