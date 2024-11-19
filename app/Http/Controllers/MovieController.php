<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request): View | JsonResponse
    {
        if($request->query('search')) {
            $movies = Movie::where('title', 'LIKE', "%{$request->query('search')}%")->orderBy('created_at', 'desc')->paginate(10);

            return response()->json(['movies' => $movies]);
        } else {
            $movies = Movie::orderBy('created_at', 'desc')->paginate(10);

            return view('index', [
                'movies' => $movies,
                'pageTitle' => 'Movies Collection',
                'showBackButton' => false,
            ]);
        }
    }

    public function viewAddMovie(): View
    {
        return view('add-movie', [
            'pageTitle' => 'Add Movie',
            'showBackButton' => true,
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


        Movie::create($dataAddMovie);
        return redirect('/')->with('message', 'Success create new Movie!');
    }

    public function viewUpdateMovie(string $id): RedirectResponse | View
    {
        $movie = Movie::find($id);

        if(!isset($movie)) {
            return redirect('/')->with('error', 'Movie not found!');
        }

        return view('update-movie', [
            'movie' => $movie,
            'pageTitle' => 'Update Movie',
            'showBackButton' => true,
        ]);
    }

    public function updateMovie(Request $request, string $id): RedirectResponse
    {
        $dataUpdateMovie = $request->validate([
            'title' => ['required', 'min:3', 'max:225'],
            'director' => ['required', 'min:3', 'max:255'],
            'summary' => ['required', 'min:3', 'max:100'],
            'genres' => ['required'],
        ]);

        Movie::find($id)->update($dataUpdateMovie);
        return redirect('/')->with('message', 'Success update movie!');
    }

    public function deleteMovie(string $id): RedirectResponse
    {
        Movie::find($id)->destroy($id);
        return redirect('/')->with('message', 'Success deleted movie!');
    }
}
