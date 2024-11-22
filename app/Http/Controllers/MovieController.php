<?php

namespace App\Http\Controllers;

use App\Facades\MovieFacade;
use App\Http\Requests\Movie\MovieStoreRequest;
use App\Http\Requests\Movie\MovieUpdateRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(MovieStoreRequest $request)
    {
        MovieFacade::createMovie($request->validated());
        return redirect()->route('movies.index')->with('success', __('Фільм успішно створено'));
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $movie->load('genres');
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        MovieFacade::updateMovie($movie, $request->validated());
        return redirect()->route('movies.index')->with('success', __('Фільм успішно оновлено'));
    }
    public function destroy(Movie $movie)
    {
        MovieFacade::deleteMovie($movie);
        return redirect()->route('movies.index')->with('success', __('Фільм успішно видалено'));
    }

    public function publish(Movie $movie)
    {
        MovieFacade::togglePublishStatus($movie);
        return redirect()->route('movies.index')->with('success', __('Дія успішно виконана'));
    }
}
