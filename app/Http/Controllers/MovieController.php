<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Http\Requests;
use App\Http\Requests\CreateMovieRequest;
use Illuminate\Http\Request;
use Auth;
use Image;

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


    /**
     * Save a new movie
     *
     * @return Response
     */
    //show page
    protected function moviecreate()
    {
        return view('addmovie');
    }

    /**
     * Save a new movie
     *
     * @param CreateMovieRequest $request
     * @return Response
     */
    //add a movie
    public function moviestore(CreateMovieRequest $request){

        Movie::create($request->all());

        return redirect('/');
    }
}
