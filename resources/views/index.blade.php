@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Overview</h1>
            <nav id="sortbar">
                <ul>
                    <li><button class="delete-task" value="">Title <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></button></li>
                    <li><button class="none" value="">Year <i class="fa fa-sort" aria-hidden="true"></i></button></li>
                </ul>
            </nav>
            @foreach($movies as $movie)
                <div id="movie_list" style="background: #9d9d9d url('/uploads/avatars/{{ $movie->poster }}') no-repeat center / cover;">
                    <h4>{{ $movie->title }}</h4>
                    <h5>{{ $movie->year }}</h5>
                </div>
            @endforeach
        </div>
    </div>
@endsection
