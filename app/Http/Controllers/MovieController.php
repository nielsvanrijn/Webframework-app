<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Movie;
use Auth;

class MovieController extends Controller
{
    //default
    public function index(){
        return view('index');
    }

    //default list
    public function sort_default(){
        return view('movies', array('movies' => Movie::orderBy('title', 'ASC')->get() ) );
    }

    //decending list
    public function sort_title(){
        return view('movies', array('movies' => Movie::orderBy('title', 'DESC')->get() ) );
    }

    //decending list
    public function sort_year(){
        return view('movies', array('movies' => Movie::orderBy('year', 'DESC')->get() ) );
    }

    //dynamic
    public function sort(){
        return view('movies', array('movies' => Movie::orderBy('year', 'DESC')->get() ) );
    }
}
