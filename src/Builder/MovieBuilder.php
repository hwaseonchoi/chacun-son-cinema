<?php

namespace App\Builder;

use App\Service\TmdbApiService;
use App\Model\Film;

class MovieBuilder implements BuilderInterface
{
    private TmdbApiService $tmdbApiService;

    public function __construct(TmdbApiService $tmdbApiService)
    {
        $this->tmdbApiService = $tmdbApiService;
    }

    public function build()
    {
        $movies = [];
        $results = $this->tmdbApiService->getTopRated();
        foreach ($results as $result) {
            $movie = new Film();
            $movie->setTitle($result->title);
            $movie->setPoster($result->poster_path);
            $movies[] = $movie;
        }

        return $movies;
    }
}
