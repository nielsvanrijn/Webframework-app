@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Add a movie</h1>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/addmovie') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">Title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>
                            @if ($errors->has('title'))
                                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                        <label for="year" class="col-md-4 control-label">Year</label>
                        <div class="col-md-6">
                            <select id="year" class="form-control" name="year" value="{{date('Y')}}"></select>
                            @if ($errors->has('year'))
                                <span class="help-block"><strong>{{ $errors->first('year') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('poster') ? ' has-error' : '' }}">
                        <label for="poster" class="col-md-4 control-label">Poster image</label>
                        <div class="col-md-6">
                            <input id="poster" type="file" class="form-control" name="poster">
                            @if ($errors->has('poster'))
                                <span class="help-block"><strong>{{ $errors->first('poster') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                        <label for="duration" class="col-md-4 control-label">Duration</label>
                        <div class="col-md-6">
                            <input id="duration" type="time" class="form-control" name="duration" value="00:00">
                            @if ($errors->has('duration'))
                                <span class="help-block"><strong>{{ $errors->first('duration') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                        <label for="genre" class="col-md-4 control-label">Genre</label>
                        <span>(ctrl or cmd click for multiple selection)</span>
                        <div class="col-md-6">
                            <select id="genre" class="form-control" name="genre" value="" multiple>
                            <option value=",">All</option>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Animation">Animation</option>
                            <option value="Biography">Biography</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Crime">Crime</option>
                            <option value="Documentary">Documentary</option>
                            <option value="Drama">Drama</option>
                            <option value="Family">Family</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Film">Film-Noir</option>
                            <option value="History">History</option>
                            <option value="Horror">Horror</option>
                            <option value="Music">Music</option>
                            <option value="Musical">Musical</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Romance">Romance</option>
                            <option value="Sci">Sci-Fi</option>
                            <option value="Sport">Sport</option>
                            <option value="Thriller">Thriller</option>
                            <option value="War">War</option>
                            <option value="Western">Western</option>
                            </select>
                            @if ($errors->has('genre'))
                                <span class="help-block"><strong>{{ $errors->first('genre') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label for="date" class="col-md-4 control-label">Date</label>
                        <div class="col-md-6">
                            <input id="date" type="date" class="form-control" name="date" value="{{date('Y-m-d')}}">
                            @if ($errors->has('date'))
                                <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('director') ? ' has-error' : '' }}">
                        <label for="director" class="col-md-4 control-label">Director</label>
                        <div class="col-md-6">
                            <input id="director" type="text" class="form-control" name="director">
                            @if ($errors->has('director'))
                                <span class="help-block"><strong>{{ $errors->first('director') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('stars') ? ' has-error' : '' }}">
                        <label for="stars" class="col-md-4 control-label">Stars</label>
                        <div class="col-md-6">
                            <input id="stars" type="text" class="form-control" name="stars">
                            @if ($errors->has('stars'))
                                <span class="help-block"><strong>{{ $errors->first('stars') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('trailer url') ? ' has-error' : '' }}">
                        <label for="trailer url" class="col-md-4 control-label">Trailer url</label>
                        <div class="col-md-6">
                            <input id="trailer url" type="url" class="form-control" name="trailer url">
                            @if ($errors->has('trailer url'))
                                <span class="help-block"><strong>{{ $errors->first('trailer url') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('storyline') ? ' has-error' : '' }}">
                        <label for="storyline" class="col-md-4 control-label">Storyline</label>
                        <div class="col-md-6">
                            <textarea id="storyline" type="url" class="form-control" name="storyline"></textarea>
                            @if ($errors->has('storyline'))
                                <span class="help-block"><strong>{{ $errors->first('storyline') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Add movie
                            </button>
                        </div>
                    </div>
                </form>
                {{ Form::open(array('url' => 'foo/bar')) }}
                //
                {{ Form::close() }}
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
