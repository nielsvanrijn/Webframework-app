@foreach($movies as $movie)
    <div id="movie_item" style="background: #9d9d9d url('/uploads/avatars/{{ $movie->poster }}') no-repeat center / cover;">
        <h4>{{ $movie->title }}</h4>
        <h5>{{ $movie->year }}</h5>
    </div>
@endforeach
