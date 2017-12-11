@extends('layouts.app')

@section('content')
    <header class="masthead" style="background-image: url('http://placekitten.com/800/300')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Bootstrap 樣板... -->
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                @foreach($articles as $article)
                    <a href="{{ route('articles.show', $article->id) }}">
                        <h2 class="post-title">
                            {{ $article->title }}
                        </h2>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>
                        on September 24, 2017</p>
                    @foreach($article->tags()->get() as $tag)
                        {{--{{ dd($tag->name) }}--}}
                        <span><a href=""> #{{ $tag->name }} </a></span>
                    @endforeach
                    @auth
                    @if(Auth::user()->hasFavorited($article->id) === true)
                        <form action="{{ route('favorite.like') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $article->id }}" name="article_id">
                            <button class="btn btn-md btn-danger" type="submit">Like</button>
                        </form>
                    @else(Auth::user()->hasFavorited() === false)
                        <form action="{{ route('favorite.like') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $article->id }}" name="article_id">
                            <button class="btn btn-md btn-primary" type="submit">unLike</button>
                        </form>
                    @endif
                    @endauth
                @endforeach
            </div>
            <hr>
            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
    {{ $articles->links() }}
@endsection

