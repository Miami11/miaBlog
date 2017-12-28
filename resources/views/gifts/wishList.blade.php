@extends('layouts.app')

@section('content')


    <h1>Your Wishlist</h1>

    <hr>

    @if (session()->has('gifts'))
        {{--{{ dd($gifts) }}--}}
        @foreach($gifts as $gift)
            <form action="{{ route('gift.destroy',$gift->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="col-sm-4 text-center">
                    <img class="product" src="{{ asset($gift->path.'.jpeg') }}" alt="Card image cap">
                    <p class="card-text text-center"> Name:{{ $gift->name }}</p>
                    <p class="card-text text-center">Points:{{ $gift->points }}</p>
                    <button type="submit" class="btn btn-default">
                        <input type="hidden" name="id" value="{{ $gift->id }}">
                        <i class="fa fa-plus"></i> Delete
                    </button>
                </div>
            </form>
        @endforeach

    @endif
    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @endif
    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session()->get('error_message') }}
        </div>
    @endif
@endsection