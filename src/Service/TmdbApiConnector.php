<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class TmdbApiConnector
{
    protected array $tmdbParam;
    protected string $url;
    protected $client;

    public function __construct(array $param)
    {
        $this->tmdbParam = $param['tmdb'];
        $this->url = $this->tmdbParam['base_url'];
        $this->client = HttpClient::create();
    }

    public function request(string $method,  string $extendedUrl = null, array $queryParam = [])
    {
        $apiKeyQuery = [
            'query' => [
                'api_key' => $this->tmdbParam['api_key'],
            ]
        ];

        return $this->client->request(
            $method,
            $this->url  . $extendedUrl,
            array_merge($queryParam, $apiKeyQuery)
        );
    }
}
