<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

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
        $client = HttpClient::create();

        return $client->request('GET',$this->connector->connect() . '&t=' .$query);
    }
}
