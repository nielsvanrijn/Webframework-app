<?php

namespace App\Http\Controllers;

use App\Genres;
use App\Movie;
use App\Http\Requests;
use App\Http\Requests\CreateMovieRequest;
use App\Movie_Genre;
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
    public function sort($what, $how, $genre_id){
        //Get the movie_id's where genre matches
        $moviesByGenre = Movie_Genre::where('genre_id', '=', $genre_id)->get();

        //create empty array
        $movieCollection = [];
        //loop trouhg all movies where the previous movie_id's match and put them in the array
        foreach ($moviesByGenre as $movie) {
            $movieCollection[] = Movie::where('id', '=', $movie->movie_id)->first();
        }

        //Dynamic sort function
        function orderBy($data, $field, $how)
        {
            $code = "return strnatcmp(\$a['$field'], \$b['$field']);";
            usort($data, create_function('$a,$b', $code));
            if($how == "DESC"){$data = array_reverse($data);};
            return $data;
        }
        //call the previous function
        $movies = orderBy($movieCollection, $what, $how);

        //return $what." ".$how." ".$genre_id;
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
//    add a movie
    public function moviestore(CreateMovieRequest $request){

        Movie::create($request->all());

        return redirect('/');
    }
//    public function moviestore(Request $reqest){
//
//        $input = $reqest->all();
//
//        return $input;
//    }
}
