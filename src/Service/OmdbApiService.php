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
        $results = $this->connector->request('GET','&t=' . $query);
        if ($results->toArray()) {
            return [Film::create($results->toArray())];
        }
    }
}
