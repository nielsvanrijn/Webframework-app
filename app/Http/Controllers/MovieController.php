<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Requests\UpdateMovieRequest;
use App\Movie;
use App\Http\Requests;
use App\Http\Requests\CreateMovieRequest;
use App\Movie_Genre;
use Illuminate\Http\Request;
use Auth;
use Image;

class MovieController extends Controller
{
    // DEFAULT PAGE SHOW
    public function index(){
        return view('index');
    }

    //--------------------------
    //     DEFAULT MOVIE LIST
    //--------------------------
    public function sort_default(){
        //Load all movies by title ascending
        $movies = Movie::orderBy('title', 'ASC')->get();

        return view('movies', compact('movies') );
    }
    //--------------------------
    //     DYNAMIC SORT
    //--------------------------
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

        return view('movies', compact('movies'));
    }

    //--------------------------
    //     SHOW ADDMOVIE FORM
    //--------------------------
    protected function moviecreate()
    {
        return view('addmovie');
    }

    //--------------------------
    // STORE MOVIE IN DATABASE
    //--------------------------
    public function moviestore(CreateMovieRequest $request){
        //return $request->all();

        $newmovie = new Movie();
        $newmovie->title = $request->title;
        $newmovie->year = $request->year;
        $newmovie->duration = $request->duration;
        $newmovie->date = $request->date;
        $newmovie->director = $request->director;
        $newmovie->stars = $request->stars;
        if(!$request->trailer == ""){
            $newmovie->trailer = $request->trailer;
        }
        $newmovie->storyline = $request->storyline;


        if ($request->hasFile('poster')) {

            $poster = $request->file('poster');
            $filename = time() . '.' . $poster->getClientOriginalExtension();
            Image::make($poster)->resize(356, 514)->save( public_path('/uploads/posters/' . $filename) );

            $newmovie->poster = $filename;
        }
        $newmovie->save();

        $newmovie->genres()->sync($request->genre);
        return redirect('/');
    }

    //--------------------------
    //     MOVIE DETAIL
    //--------------------------
    public function detail($movie_id){
        $movie = Movie::findOrFail($movie_id);
        $genre_id = Movie_Genre::where('movie_id', '=', $movie->id)->pluck('genre_id');

        return view('detail', compact('movie', 'genre_id'));
    }

    //--------------------------
    //    MOVIE DELETE
    //--------------------------
    public function destroy($movie_id){
        Movie_Genre::where('movie_id', '=', $movie_id)->delete();
        Movie::findOrFail($movie_id)->delete();

        return redirect('/');
    }

    //--------------------------
    //    MOVIE UPDATE / EDIT
    //--------------------------
    public function editmovie(UpdateMovieRequest $request){
        //return $request->all();

        $movie = Movie::find($request->movie_id);
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->duration = $request->duration;
        $movie->date = $request->date;

        $movie->director = $request->director;
        $movie->stars = $request->stars;
        if(!$request->trailer == ""){
            $movie->trailer = $request->trailer;
        }
        $movie->storyline = $request->storyline;


        if ($request->hasFile('poster')) {

            $poster = $request->file('poster');
            $filename = time() . '.' . $poster->getClientOriginalExtension();
            Image::make($poster)->resize(356, 514)->save( public_path('/uploads/posters/' . $filename) );

            $movie->poster = $filename;
        }
        $movie->save();

        $movie->genres()->sync($request->genre);


        $movie = Movie::findOrFail($request->movie_id);
        $genre_id = Movie_Genre::where('movie_id', '=', $movie->id)->pluck('genre_id');

        //return redirect('detail', compact('movie', 'genre_id'));
        return redirect("detail/$movie->id")->with('movie', 'genre_id');
    }

    //--------------------------
    //    SEARCH FUNCTION
    //--------------------------
    public function seachmovie($what){

        if($what == "*"){
            $movies = Movie::orderBy('title', 'ASC')->get();
        } else {
            $movies = Movie::where('title', 'LIKE', '%'.$what.'%')->get();
            $array = [$what, $movies];
            //return $movies;
        }
        return view('movies', compact('movies'));
    }
}
