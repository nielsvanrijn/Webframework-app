@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Overview</h1>
            <br>
            @foreach($movies as $movie)
                <div id="movie" style="width: 200px; height: 350px; margin:0 10px 0 10px; padding: 0 0 0 10px; float: left; border-radius: 10px; background: url('/uploads/avatars/{{ $movie->poster }}') no-repeat center / cover;">
                    <h4>{{ $movie->title }}</h4>
                    <h5>{{ $movie->year }}</h5>
                </div>
            @endforeach
        </div>
    </div>
@endsection
