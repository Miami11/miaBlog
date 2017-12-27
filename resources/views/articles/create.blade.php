@extends('layouts.app')

@section('content')
    @include('editor::head')
    <div class="row">
        <div class="col-lg-8">

            <form class="form-horizontal" action="{{ route('articles.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Title:</label>
                    <div class="col-sm-10">
                        <input required type="text" class="form-control" id="title" placeholder="title" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Tag:</label>
                    <div class="col-sm-10">
                        <input required type="text" name="tag" placeholder="#tag" class="form-control" id="tag">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Content:</label>
                    <div class="col-sm-10">
                        <input required type="text" name="description" placeholder="content" class="form-control" id="tag">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection