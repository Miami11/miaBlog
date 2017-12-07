@extends('layouts.app')

@section('content')

    <!-- Bootstrap 樣板... -->

    <div class="panel-body">
        <!-- 顯示驗證錯誤 -->

        <!-- 新任務的表單 -->

        <div role="main" class="container">

            <div class="row">

                <div class="col-sm-8 blog-main">

                    <div class="blog-post">
                        @foreach($articles as $article)
                            {{--{{ dd($article->tags()->get()) }}--}}
                            <a href="{{ route('articles.show', $article->id) }}"><h2
                                        class="blog-post-title">{{ $article->title }}</h2></a>
                            <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

                            @foreach($article->tags()->get() as $tag)
                               {{--{{ dd($tag->name) }}--}}
                                <span><a href=""> #{{ $tag->name }} </a></span>
                                {{--<p>{{ $article->description }}</p>--}}
                            @endforeach
                        @endforeach

                    </div>
                    {{--<aside class="col-sm-3 ml-sm-auto blog-sidebar">--}}
                    {{--<div class="sidebar-module sidebar-module-inset">--}}
                    {{--<h4>About</h4>--}}
                    {{--<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>--}}
                    {{--</div>--}}
                    {{--<div class="sidebar-module">--}}
                    {{--<h4>Archives</h4>--}}
                    {{--<ol class="list-unstyled">--}}
                    {{--<li><a href="#">March 2014</a></li>--}}
                    {{--<li><a href="#">February 2014</a></li>--}}
                    {{--</ol>--}}
                    {{--</div>--}}
                    {{--<div class="sidebar-module">--}}
                    {{--<h4>Elsewhere</h4>--}}
                    {{--<ol class="list-unstyled">--}}
                    {{--<li><a href="#">GitHub</a></li>--}}
                    {{--<li><a href="#">Twitter</a></li>--}}
                    {{--<li><a href="#">Facebook</a></li>--}}
                    {{--</ol>--}}
                    {{--</div>--}}
                    {{--</aside><!-- /.blog-sidebar -->--}}
                </div>
            </div>
        {{ $articles->links() }}
        {{--<label for="task-name" class="col-sm-3 control-label">任務</label>--}}

        {{--<div class="col-sm-6">--}}

        {{--</div>--}}


        <!-- 增加任務按鈕-->

        </div>

        <!-- 代辦：目前任務 -->
@endsection

