<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Http\Resources\MovieResource;
use App\Models\Genre;
use App\Services\PaginationService;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return GenreResource::collection(Genre::all());
    }

    public function show(Genre $genre)
    {
        $movies = $genre->movies()->with('genres')->paginate(PaginationService::getPerPage());
        return  MovieResource::collection($movies);
    }
}
