@extends('layouts.app')

@section('content')
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
                            <li class="active ajax">All</li>
                            <li class="ajax">Action</li>
                            <li class="ajax">Adventure</li>
                            <li class="ajax">Animation</li>
                            <li class="ajax">Biography</li>
                            <li class="ajax">Comedy</li>
                            <li class="ajax">Crime</li>
                            <li class="ajax">Documentary</li>
                            <li class="ajax">Drama</li>
                            <li class="ajax">Family</li>
                            <li class="ajax">Fantasy</li>
                            <li class="ajax">Film-Noir</li>
                            <li class="ajax">History</li>
                            <li class="ajax">Horror</li>
                            <li class="ajax">Music</li>
                            <li class="ajax">Musical</li>
                            <li class="ajax">Mystery</li>
                            <li class="ajax">Romance</li>
                            <li class="ajax">Sci-Fi</li>
                            <li class="ajax">Sport</li>
                            <li class="ajax">Thriller</li>
                            <li class="ajax">War</li>
                            <li class="ajax">Western</li>
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
@endsection
