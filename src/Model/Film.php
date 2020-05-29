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

    public static function create($data)
    {
        $film = new Film();
      //  $film->setDirector($data['Director']);
        $film->setTitle($data['Title']);
        $film->setYear($data['Year']);

        return $film;
    }
}
