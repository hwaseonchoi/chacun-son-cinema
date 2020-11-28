<?php

namespace App\Model;

class Film
{
    public ?int $tmdbId;
    public string $title;
    public ?string $director;
    public ?int $year;
    public ?string $imdbID;
    public ?string $poster;
    public ?Rate $rate;

    /**
     * @return ?int
     */
    public function getTmdbId(): ?int
    {
        return $this->id;
    }

    /**
     * @param ?int $id
     */
    public function setTmdbId(?int $tmdbId): void
    {
        $this->tmdbId = $tmdbId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return ?string
     */
    public function getDirector(): string
    {
        return $this->director;
    }

    /**
     * @param ?string $director
     */
    public function setDirector(?string $director): void
    {
        $this->director = $director;
    }

    /**
     * @return ?int
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @param ?int $year
     */
    public function setYear(?int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return ?string
     */
    public function getPoster(): ?string
    {
        return $this->poster;
    }

    /**
     * @param ?string $poster
     */
    public function setPoster(?string $poster): void
    {
        $this->poster = $poster;
    }

    /**
     * @return ?string
     */
    public function getImdbID(): string
    {
        return $this->imdbID;
    }

    /**
     * @param ?string $imdbID
     */
    public function setImdbID(?string $imdbID): void
    {
        $this->imdbID = $imdbID;
    }

    public static function create($data)
    {
        $film = new self();
        $film->setImdbID($data->imdb_id);
        $film->setTmdbId($data->id);
        $film->setTitle($data->title);
        $film->setDirector('NA');
        $film->setYear((int) substr($data->release_date, 0, 4));
        $film->setPoster($data->poster_path);

        return $film;
    }
}
