<footer>

            <div class="col-lg-12 col-md-10 mx-auto">

                <h3>Tag List:</h3>
                <ol class="list-unstyled">
                    @foreach($tags as $tag)
                        <a href="{{ route('articles.tag',$tag) }}">{{ $tag }}</a>
                    @endforeach
                </ol>
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
            </div>

</footer>
