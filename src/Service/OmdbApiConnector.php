<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class OmdbApiConnector
{
    protected $url;
    protected $client;

    public function __construct(string $param)
    {
        $this->url = $param;
        $this->client = HttpClient::create();
    }

    public function request(string $method, string $criteria)
    {
        return $this->client->request($method, $this->url . $criteria);
    }
}
