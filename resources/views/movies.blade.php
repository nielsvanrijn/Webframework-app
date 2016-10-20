@foreach($movies as $movie)
    <a href='detail/{{$movie['id']}}'>
        <div class="movie_item">
            <div class="movie_poster" style="background: #9d9d9d url('/uploads/posters/{{ $movie['poster'] }}') no-repeat center / cover;"><span><i class="fa fa-heart"></i> {{ $movie['rating'] }}<ins> / 10</ins></span></div>
            <h5>{{ $movie['title'] }}</h5>
            <h6>{{ $movie['year'] }}</h6>
        </div>
    </a>
@endforeach
