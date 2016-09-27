<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Movie;
use Auth;

class MovieController extends Controller
{
    public function movie(){
        return view('index', array('movies' => Movie::all()) );
    }

    public function test(){
        echo "test";
    }
}
