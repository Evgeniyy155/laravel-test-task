<?php

namespace App\Facades;

use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Support\Facades\Facade;
/**
 * @method static Movie createMovie(array $data)
 * @method static Movie updateMovie(Movie $movie, array $data)
 * @method static void deleteMovie(Movie $movie)
 * @method static Movie togglePublishStatus(Movie $movie)
 *
 * @see MovieService
 */
class MovieFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'movieService';
    }
}
