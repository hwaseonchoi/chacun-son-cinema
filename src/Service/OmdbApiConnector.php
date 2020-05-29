<?php

namespace App\Service;

class OmdbApiConnector
{
    protected $url;

    public function __construct(string $param)
    {
        $this->url = $param;
    }

    public function connect()
    {
        return $this->url;
    }
}
