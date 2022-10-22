<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Retrieve a page of movies from the database, Default sorting is by Rating.
     *
     * @return View The basic view of movies for the current page.
     */
    public function page() {
        return view('index', [
            'movies' => Movie::orderBy('rating', 'desc')->paginate(8)
        ]);
    }

    public function show(Movie $movie): View
    {
        return view('movies.show',compact('movie'));
    }

    /**
     * Retrieve a list of movies from the database filtered by title,description,year,director.
     *
     * @return JsonResponse The list of movies found from search.
     */
    public function search(Request $request): JsonResponse
    {
        return response()->json([
            'movies' => Movie::search($request->get('query'))
        ]);
    }
}
