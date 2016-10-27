@extends('layouts.app')

@section('content')
    <section id="addmovie">
    <div class="container">
        <div class="row">
            <h1>Add a movie</h1>
            <div class="panel-body">
                {{ Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'action' => 'MovieController@moviestore', 'files' => true)) }}

                {{--TITLE--}}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('title', 'Title', ['class' => 'form-control', 'id'=>'title', 'autofocus'=>'autofocus']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--YEAR--}}
                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                    {!! Form::label('year', 'Year', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('year', [], date('Y'), ['class' => 'form-control', 'id'=>'year']) !!}
                    @if ($errors->has('year'))
                            <span class="help-block"><strong>{{ $errors->first('year') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--POSTER--}}
                <div class="form-group{{ $errors->has('poster') ? ' has-error' : '' }}">
                    {!! Form::label('poster', 'Poster image', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::file('poster', '', ['class' => 'form-control', 'id'=>'poster'])!!}
                        @if ($errors->has('poster'))
                            <span class="help-block"><strong>{{ $errors->first('poster') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--DURATION--}}
                <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                    {!! Form::label('duration', 'Duration', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::time('duration', '00:00', ['class' => 'form-control', 'id'=>'duration']) !!}
                        @if ($errors->has('duration'))
                            <span class="help-block"><strong>{{ $errors->first('duration') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--GENRE--}}
                <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                    {!! Form::label('genre', 'Genre', ['class' => 'col-md-4 control-label']) !!}
                    <span class="col-lg-4">(ctrl or cmd click for multiple selection)</span>
                    <div class="col-md-6">
                        <?php $genreslist2 = \App\Genre::pluck('genre', 'id'); ?>
                            {{ Form::select('genre[]', $genreslist2,  1, ['multiple'=>'multiple', 'class' => 'form-control', 'id'=>'genre', 'value' => '1' ]) }}
                        @if ($errors->has('genre'))
                            <span class="help-block"><strong>{{ $errors->first('genre') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--DATE--}}
                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::date('date', date('Y-m-d'), ['class' => 'form-control', 'id'=>'date']) !!}
                        @if ($errors->has('date'))
                            <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--DIRECTOR--}}f
                <div class="form-group{{ $errors->has('director') ? ' has-error' : '' }}">
                    {!! Form::label('director', 'Director', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('director', 'Jhon Doe', ['class' => 'form-control', 'id'=>'director']) !!}
                        @if ($errors->has('director'))
                            <span class="help-block"><strong>{{ $errors->first('director') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--STARS--}}
                <div class="form-group{{ $errors->has('stars') ? ' has-error' : '' }}">
                    {!! Form::label('stars', 'Stars', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('stars', 'Jhon Doe, Jane Doe', ['class' => 'form-control', 'id'=>'stars']) !!}
                        @if ($errors->has('stars'))
                            <span class="help-block"><strong>{{ $errors->first('stars') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--TRAILER URL--}}
                <div class="form-group{{ $errors->has('trailer') ? ' has-error' : '' }}">
                    {!! Form::label('trailer', 'Trailer url', ['class' => 'col-md-4 control-label']) !!}
                    <span class="col-lg-4">(Must be a youtube link)</span>
                    <div class="col-md-6">
                        {!! Form::url('trailer', 'https://', ['class' => 'form-control', 'id'=>'trailer']) !!}
                        @if ($errors->has('trailer'))
                            <span class="help-block"><strong>{{ $errors->first('trailer') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--STORYLINE--}}
                <div class="form-group{{ $errors->has('storyline') ? ' has-error' : '' }}">
                    {!! Form::label('storyline', 'Storyline', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::textarea('storyline', 'In A world...', ['class' => 'form-control', 'id'=>'storyline']) !!}
                        @if ($errors->has('storyline'))
                            <span class="help-block"><strong>{{ $errors->first('storyline') }}</strong></span>
                        @endif
                    </div>
                </div>

                {{--SUBMIT--}}
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-6">
                        {!! Form::submit('Add movie', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </section>
@endsection
