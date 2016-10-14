@extends('layouts.app')

@section('content')
    <section id="moviedetail">
    @if (strpos($movie->trailer, 'youtube.com') !== false || strpos($movie->trailer, 'youtu.be') !== false)
        <?php $ytcode = substr($movie->trailer, -11); ?>
        <iframe id="ytplayer" type="text/html" width="100%" height="500px"
                src="https://www.youtube.com/embed/{{$ytcode}}?autoplay=0&controls=0&showinfo=0&rel=0?iv_load_policy=3?modestbranding=1"
                frameborder="0">
        </iframe>
    @endif
    <div class="container">
        <div class="row">
            <h1>{{ $movie->title }}</h1>
            {{$genre_id}}
            <h3>
                @for($i = 1;$i<count($genre_id);$i++)
                    {{ \App\Genre::where('id', '=', $genre_id[$i])->value('genre') }}
                @endfor
            </h3>
            <div class="movie_poster" style="background: #9d9d9d url('/uploads/posters/{{ $movie->poster }}') no-repeat center / cover;"></div>
        </div>
    </div>
    </section>
@endsection
