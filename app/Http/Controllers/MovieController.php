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

    //default movie list
    public function sort_default(){
        //Load all movies by title ascending
        $movies = Movie::orderBy('title', 'ASC')->get();

        return view('movies', compact('movies') );
    }
    //dynamic sort
    public function sort($what, $how, $genre){
        //Get & sort all movies by variables
        $movies = Movie::where('genre', 'LIKE', '%' . $genre . '%')->orderBy($what, $how)->get();

        return view('movies', compact('movies'));
    }

    //add a movie
    public function addmovie(){
        return view('addmovie');
    }
}
