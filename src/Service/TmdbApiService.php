<?php

namespace App\Service;

use App\Model\Film;
use Symfony\Component\HttpFoundation\Response;

class TmdbApiService
{
    protected const METHOD_GET = 'GET';

    public TmdbApiConnector $connector;

    public function __construct(TmdbApiConnector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function searchById(int $id)
    {
        $film = null;
        $response = $this->connector->request(
            static::METHOD_GET,
            '/movie/' . $id
        );

        if (Response::HTTP_OK === $response->getStatusCode()) {
            $results = $response->getContent();

            $film = Film::create(json_decode($results));
        }

        return $film;
    }

    public function getTopRated()
    {
        $film = null;
        $response = $this->connector->request(
            static::METHOD_GET,
            '/movie/top_rated',
        );

        if (Response::HTTP_OK === $response->getStatusCode()) {
            $results = $response->getContent();
            if ($results = json_decode($results)->results) {
                return $results;
            }
        }
    }
}
