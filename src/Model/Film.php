<?php

namespace App\Model;

class Film
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $director;

    /**
     * @var int
     */
    public $year;

    /**
     * @var string
     */
    public $imdbID;

    /**
     * @var string
     */
    public $poster;

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
     * @return string
     */
    public function getDirector(): string
    {
        return $this->director;
    }

    /**
     * @param string $director
     */
    public function setDirector(string $director): void
    {
        $this->director = $director;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     */
    public function setPoster(string $poster): void
    {
        $this->poster = $poster;
    }

    /**
     * @return string
     */
    public function getImdbID(): string
    {
        return $this->imdbID;
    }

    /**
     * @param string $imdbID
     */
    public function setImdbID(string $imdbID): void
    {
        $this->imdbID = $imdbID;
    }

    public static function create($data)
    {
        $film = new Film();
        $film->setImdbID($data['imdbID']);
        $film->setTitle($data['Title']);
        $film->setDirector($data['Director']);
        $film->setYear(preg_replace('/[^0-9]/i', '',$data['Year']));
        $film->setPoster($data['Poster']);

        return $film;
    }
}
