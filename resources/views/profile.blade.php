@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
            <h2>{{ $user->name }}'s profile</h2>

            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
