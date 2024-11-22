<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieService
{
    public function createMovie(array $data): Movie
    {
        $posterPath = $this->handlePosterUpload($data['poster'] ?? null);

        $movie = Movie::query()->create([
            'title' => $data['title'],
            'poster' => $posterPath,
        ]);

        if (!empty($data['genres'])) {
            $movie->genres()->attach($data['genres']);
        }

        return $movie;
    }

    public function updateMovie(Movie $movie, array $data): Movie
    {
        $posterPath = $this->handlePosterUpdate($movie, $data['poster'] ?? null);

        $movie->update([
            'title' => $data['title'],
            'poster' => $posterPath,
        ]);

        if (!empty($data['genres'])) {
            $movie->genres()->sync($data['genres']);
        }

        return $movie;
    }

    public function deleteMovie(Movie $movie): void
    {
        $this->handlePosterDeletion($movie);

        $movie->delete();
    }

    public function togglePublishStatus(Movie $movie): Movie
    {
        $movie->is_published = !$movie->is_published;
        $movie->save();

        return $movie;
    }
    protected function handlePosterUpload($poster): string
    {
        if ($poster) {
            $posterPath = $poster->store('images/movies', 'public');
            return 'storage/' . $posterPath;
        }

        return 'images/defaults/default-poster.jpg';
    }

    protected function handlePosterUpdate(Movie $movie, $poster): string
    {
        if ($poster) {
            $this->handlePosterDeletion($movie);

            $posterPath = $poster->store('images/movies', 'public');
            return 'storage/' . $posterPath;
        }

        return $movie->poster;
    }

    protected function handlePosterDeletion(Movie $movie): void
    {
        if ($movie->poster !== 'images/defaults/default-poster.jpg' && Storage::disk('public')->exists($movie->poster)) {
            Storage::disk('public')->delete($movie->poster);
        }
    }
}
