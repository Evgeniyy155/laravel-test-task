<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\GenreStoreRequest;
use App\Http\Requests\Genre\GenreUpdateRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }
    public function store(GenreStoreRequest $request)
    {
        Genre::query()->create($request->validated());
        return redirect()->route('genres.index')->with(['success' => __('Жанр створено успішно')]);
    }
    public function show(Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }
    public function update(GenreUpdateRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return redirect()->route('genres.index')->with(['success' => __('Жанр оновлено успішно')]);
    }
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with(['success' => __('Жанр видалено успішно')]);
    }
}
