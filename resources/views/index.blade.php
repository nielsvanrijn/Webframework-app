@extends('layouts.app')

@section('content')
    <section id="overview">
    <div class="container">
        <div class="row">
            <h1>Overview</h1>
            <nav id="sortbar">
                <ul>
                    <li><button class="ajax" value="DESC">Title <i class="fa fa-sort-alpha-asc"></i><i class="hide fa fa-sort-alpha-desc"></i></button></li>
                    <li><button class="ajax" value="DESC">Year <i class="fa fa-sort-numeric-asc"></i><i class="hide fa fa-sort-numeric-desc"></i></button></li>
                    <li><button class="ajax" value="DESC">Rating <i class="fa fa-sort-numeric-asc"></i><i class="hide fa fa-sort-numeric-desc"></i></button></li>
                    <li class="dropdown">
                        <button class="dropdown-toggle" data-toggle="dropdown">Genre <i class="fa fa-caret-down"></i></button>
                        <ul class="generes dropdown-menu" role="menu">
                            @foreach(\App\Genre::all() as $genre)
                                <li class="ajax" data-id="{{$genre->id}}">{{$genre->genre}}</li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <ul id="addmovie">
                    <li><a href="{{ url('/addmovie') }}"><button><i class="fa fa-plus"></i> Add a movie</button></a></li>
                </ul>
            </nav>
            <div id="movie_list"></div>
        </div>
        <div class="loading"></div>
    </div>
    </section>
@endsection
