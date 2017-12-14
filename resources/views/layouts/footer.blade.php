<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">

                    <h1>Archives</h1>
                    <ol class="list-group">
                        @foreach($archives as $stats)
                            <li class="list-group-item justify-content-between">
                                <a href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">{{ $stats['month'].'  '.$stats['year'] }}</a>
                            </li>
                        @endforeach
                    </ol>
                </ul>
               <h3>Tag:</h3>
                <ol class="list-unstyled">
                @foreach($tags as $tag)
                        <a href="{{ route('articles.tag',$tag) }}">{{ $tag }}</a>
                @endforeach
                </ol>
            </div>
        </div>
    </div>
</footer>
