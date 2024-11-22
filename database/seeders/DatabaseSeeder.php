<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GenreSeeder::class,
            MovieSeeder::class
        ]);

        $movies = Movie::all();
        $genres = Genre::all();

        $movies->each(function ($movie) use ($genres) {
            $randomGenres = $genres->random(rand(1, 3));
            $movie->genres()->attach($randomGenres->pluck('id')->toArray());
        });
    }
}
