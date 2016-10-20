@extends('layouts.app')

@section('content')
    <section id="moviedetail">
    @if (strpos($movie->trailer, 'youtube.com') !== false || strpos($movie->trailer, 'youtu.be') !== false)
            {{ $ytcode = substr($movie->trailer, -11) }}
        <iframe id="ytplayer" type="text/html" width="100%" height="500px"
                src="https://www.youtube.com/embed/{{$ytcode}}?autoplay=0&controls=0&showinfo=0&rel=0?iv_load_policy=3?modestbranding=1"
                frameborder="0">
        </iframe>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="movie_poster" style="background: #9d9d9d url('/uploads/posters/{{ $movie->poster }}') no-repeat center / cover;"></div>
            </div>
            <div id="info" class="col-md-8">
                {{ Form::open(array('class' => 'form-horizontal', 'id' => 'form', 'role' => 'form', 'method' => 'POST', 'action' => 'MovieController@editmovie', 'files' => true)) }}

                <h1>{{ $movie->title }}</h1>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <h1>
                        {!! Form::text('title', $movie->title, ['id'=>'title']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                    </h1>
                </div>

                {!! Form::close() !!}
                <ul class="col-md-12">@for($i = 1;$i<count($genre_id);$i++)<li><h4>{{\App\Genre::where('id', '=', $genre_id[$i])->value('genre')}}</h4></li>@endfor</ul>
                <h5>{{$movie->year}}</h5>
                <h4>Duration</h4>
                <h5>{{$movie->duration}}</h5>
                <h4>In theaters</h4>
                <h5>{{$movie->date}}</h5>
                <h4>Directors</h4>
                <h5>{{$movie->director}}</h5>
                <h4>Stars</h4>
                <h5>{{$movie->stars}}</h5>
                <h4>Synopsis</h4>
                <h5>{{$movie->storyline}}</h5>
            </div>
            @if (Auth::user()['mod'] == '1')
                <a href='{{url('/delete')}}/{{$movie->id}}'><button class="btn btn-danger">Remove movie</button></a>
            @endif
            <button id="editmovie" class="btn btn-warning" value="{{$movie->id}}">Edit movie</button>
        </div>
    </div>
    </section>
@endsection
