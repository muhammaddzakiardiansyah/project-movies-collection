<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')->paginate(10);
        return view('index', [
            'movies' => $movies,
            'pageTitle' => 'Movies Collection',
        ]);
    }

    public function viewAddMovie()
    {
        return view('add-movie', [
            'pageTitle' => 'Add Movie'
        ]);
    }

    public function addMovie(Request $request)
    {
       $dataAddMovie = $request->validate([
        'title' => ['required', 'min:3', 'max:225'],
        'director' => ['required', 'min:3', 'max:255'],
        'summary' => ['required', 'min:3', 'max:100'],
        'genres' => ['required'],
       ]);

       $isMovieExist = Movie::where('id', $request->movie_id)->first();
       if($isMovieExist) {
        dd('ada bang' . $isMovieExist . ',' . $request->movie_id);
       } else {
        Movie::create($dataAddMovie);
        return redirect('/')->with('message', 'Success create new Movie!');
       }
    }
}
