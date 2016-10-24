@extends('layouts.app')

@section('content')
    <section id="moviedetail">
    @if (!$movie->trailer == "")
            <?php $ytcode = substr($movie->trailer, -11) ?>
        <iframe id="ytplayer" type="text/html" width="100%" height="500px"
                src="https://www.youtube.com/embed/{{$ytcode}}?autoplay=0&controls=0&showinfo=0&rel=0?iv_load_policy=3?modestbranding=1"
                frameborder="0">
        </iframe>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="movie_poster" style="background: #9d9d9d url('/uploads/posters/{{ $movie->poster }}') no-repeat center / cover;"></div>
                @if (Auth::user()['mod'] == '1')
                    <a href='{{url('/delete')}}/{{$movie->id}}'><button id="deletemovie" class="btn btn-danger">Remove movie</button></a>
                @endif
                <button id="editmovie" class="btn btn-warning">Edit movie</button>
            </div>
            <div id="form" class="col-md-8 @if(strlen($errors->first()) > 0)postback @endif">
                {!! Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'action' => 'MovieController@editmovie', 'files' => true)) !!}

                {{ Form::hidden('movie_id', $movie->id) }}

                {{--TITLE--}}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('title', $movie->title, ['class' => 'form-control', 'id'=>'title', 'autofocus'=>'autofocus']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--YEAR--}}
                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                    {!! Form::label('year', 'Year', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('year', [], $movie->year, ['class' => 'form-control', 'id'=>'year', 'data-year' => "$movie->year"]) !!}
                        @if ($errors->has('year'))
                            <span class="help-block"><strong>{{ $errors->first('year') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--POSTER--}}
                <div class="form-group{{ $errors->has('poster') ? ' has-error' : '' }}">
                    {!! Form::label('poster', 'Poster image', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::file('poster', '', ['class' => 'form-control', 'id'=>'poster'])!!}
                        @if ($errors->has('poster'))
                            <span class="help-block"><strong>{{ $errors->first('poster') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--DURATION--}}
                <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                    {!! Form::label('duration', 'Duration', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::time('duration', $movie->duration, ['class' => 'form-control', 'id'=>'duration']) !!}
                        @if ($errors->has('duration'))
                            <span class="help-block"><strong>{{ $errors->first('duration') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--GENRE--}}
                <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                    {!! Form::label('genre', 'Genre', ['class' => 'col-md-2 control-label']) !!}
                    <span class="col-md-6">(ctrl or cmd click for multiple selection)</span>
                    <div class="col-md-6">
                        <?php $genreslist2 = \App\Genre::pluck('genre', 'id'); ?>
                        <?php $genrelist = []; for($i = 0;$i<count($genre_id);$i++){ $genrelist[$i] = $genre_id[$i]; } ?>
                        {{ Form::select('genre[]', $genreslist2,  $genrelist, ['multiple'=>'multiple', 'class' => 'form-control', 'id'=>'genre', 'value' => '1' ]) }}
                        @if ($errors->has('genre'))
                            <span class="help-block"><strong>{{ $errors->first('genre') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--DATE--}}
                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    {!! Form::label('date', 'Date', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::date('date', $movie->date, ['class' => 'form-control', 'id'=>'date']) !!}
                        @if ($errors->has('date'))
                            <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--DIRECTOR--}}
                <div class="form-group{{ $errors->has('director') ? ' has-error' : '' }}">
                    {!! Form::label('director', 'Director', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('director', $movie->director, ['class' => 'form-control', 'id'=>'director']) !!}
                        @if ($errors->has('director'))
                            <span class="help-block"><strong>{{ $errors->first('director') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--STARS--}}
                <div class="form-group{{ $errors->has('stars') ? ' has-error' : '' }}">
                    {!! Form::label('stars', 'Stars', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('stars', $movie->stars, ['class' => 'form-control', 'id'=>'stars']) !!}
                        @if ($errors->has('stars'))
                            <span class="help-block"><strong>{{ $errors->first('stars') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--TRAILER URL--}}
                <div class="form-group{{ $errors->has('trailer') ? ' has-error' : '' }}">
                    {!! Form::label('trailer', 'Trailer url', ['class' => 'col-md-2 control-label']) !!}
                    <span class="col-lg-6">(Must be a youtube link)</span>
                    <div class="col-md-6">
                        {!! Form::url('trailer', $movie->trailer, ['class' => 'form-control', 'id'=>'trailer']) !!}
                        @if ($errors->has('trailer'))
                            <span class="help-block"><strong>{{ $errors->first('trailer') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--STORYLINE--}}
                <div class="form-group{{ $errors->has('storyline') ? ' has-error' : '' }}">
                    {!! Form::label('storyline', 'Storyline', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::textarea('storyline', $movie->storyline, ['class' => 'form-control', 'id'=>'storyline', 'rows' => '5']) !!}
                        @if ($errors->has('storyline'))
                            <span class="help-block"><strong>{{ $errors->first('storyline') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--SUBMIT--}}
                <div class="form-group">
                    <div class="col-md-offset-2 col-sm-6">
                        {!! Form::submit('Done editing', ['class' => 'btn btn-success']) !!}
                        <div id="canceledit" class="btn btn-danger">Cancel editing</div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <div id="info" class="col-md-8">
                <h1>{{ $movie->title }}</h1>
                <ul class="col-md-12">
                    @for($i = 1;$i<count($genre_id);$i++)
                        <li><h4>{{\App\Genre::where('id', '=', $genre_id[$i])->value('genre')}}</h4></li>
                    @endfor
                </ul>
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
                @if (!$movie->trailer == "")
                    <button id="watchtrailer" class="btn btn-primary">Watch trailer</button>
                @else
                    <button class="btn disabled">No trailer</button>
                @endif
            </div>
        </div>
    </div>
    </section>
@endsection
