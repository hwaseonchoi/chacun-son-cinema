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

    /**
     * @param $query
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function search($query)
    {
        $films = [];

        $results = $this->connector->request('GET','&s=' . $query);

        if ('True' === $results->toArray()['Response']) {
            $values = $results->toArray()['Search'];

            foreach ($values as &$film) {
                $resultByImdbId = $this->connector->request('GET','&i=' . $film['imdbID']);

                if (!empty($resultByImdbId->toArray())) {
                    $film['Director'] = $resultByImdbId->toArray()['Director'];
                }

                $films[] = Film::create($film);
            }
        }

        return $films;
    }
}
