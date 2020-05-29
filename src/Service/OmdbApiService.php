<?php

namespace App\Service;

use App\Model\Film;

class OmdbApiService
{
    /**
     * @var OmdbApiConnector
     */
    public $connector;

    public function __construct(OmdbApiConnector $connector)
    {
        $this->connector = $connector;
    }

    public function searchByTitle($query)
    {
        $results = $this->connector->request('GET','&s=' . $query);

        if ($datas = $results->toArray()) {
            $values = $datas['Search'];
            foreach ($values as $film) {

                $films[] = Film::create($film);

            }
        }

        return $films;
    }
}
