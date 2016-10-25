@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Dashboard</h1>
            <div class="col-md-4">
                <?php $daysactive = abs(strtotime(date('Y-m-d H:i:s')) - strtotime(Auth::user()['created_at']))/60/60/24 ?>
                @if ( floor($daysactive) >= 5)
                    <h4>Your account is active!</h4>
                @else
                    <h3>Your just here!</h3>
                    <h4>You can't make changes to the website yet</h4>
                    <h4>Account unlocked after {{ 5 - (floor($daysactive)) }}days</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
