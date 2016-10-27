@extends('layouts.app')

@section('content')
    <div id="dashboard" class="container">
        <div class="row">
            <div id="response"></div>
            <?php $daysactive = abs(strtotime(date('Y-m-d H:i:s')) - strtotime(Auth::user()['created_at']))/60/60/24 ?>
            @if (Auth::user()['mod'] == '1')
                {{--Moderator dashboard--}}
                @if ( floor($daysactive) >= 4)
                     <div class="alert alert-success" role="alert">Your account is active!</div>
                @else
                     <div class="alert alert-danger" role="alert">
                         <strong>You are just here!</strong> You can't make changes to the website yet, account unlocked after <strong>{{ 4 - (floor($daysactive)) }} days</strong>.
                     </div>
                @endif
                <table class="table">
                    <tr>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Moderator</th>
                        <th>Set moderator</th>
                    </tr>
                @foreach(\App\User::all() as $user)
                    <tr>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['mod']}}</td>
                        <td>
                            <input type="checkbox" name="my-checkbox" data-on-text="TRUE" data-off-text="FALSE" @if($user->email == "niels@gmail.com")disabled="true"@endif @if($user->mod == 1) checked @endif>
                        </td>
                    </tr>
                @endforeach
                </table>
            @else
            {{--Non-moderator dashboard--}}
            <h1>Dashboard</h1>
                @if ( floor($daysactive) >= 5)
                    <div class="alert alert-success" role="alert">Your account is active!</div>
                @else
                    <div class="alert alert-danger" role="alert">
                    <strong>You are just here!</strong> You can't make changes to the website yet, account unlocked after <strong>{{ 4 - (floor($daysactive)) }} days</strong>.
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
