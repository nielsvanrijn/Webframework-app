@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Overview</h1>
            <nav id="sortbar">
                <ul>
                    <li><button class="sort-title" value="">Title <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></button></li>
                    <li><button class="sort-year" value="">Year <i class="fa fa-sort" aria-hidden="true"></i></button></li>
                </ul>
            </nav>
            <div id="movie_list">

            </div>
        </div>
        <div id="test">

        </div>
    </div>
@endsection
