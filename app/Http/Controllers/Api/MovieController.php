<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Services\PaginationService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genres')->paginate(PaginationService::getPerPage());
        return MovieResource::collection($movies);
    }

    public function show(Movie $movie)
    {
        $movie->load('genres');
        return new MovieResource($movie);
    }
}
