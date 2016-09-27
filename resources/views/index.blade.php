@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Overview</h1>
            <nav class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <a href=""><li>Title a-z</li></a>
                    <a href=""><li>Year old/new</li></a>
                </ul>
            </nav>
            @foreach($movies as $movie)
                <div id="overview_movie_list" style="background: #9d9d9d url('/uploads/avatars/{{ $movie->poster }}') no-repeat center / cover;">
                    <h4>{{ $movie->title }}</h4>
                    <h5>{{ $movie->year }}</h5>
                </div>
            @endforeach
        </div>
    </div>
@endsection
