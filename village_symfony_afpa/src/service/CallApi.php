<?php

namespace App\service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApi 
{
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    
    public function getMeteoVillage(): array
    {
        $response = $this->client->request(
            'GET',
            'http://api.openweathermap.org/data/2.5/weather?q=jeju&appid=32030ccfd083cb827e9a27fa85edafd5&units=metric&lang=fr'
        );
        
        return $response->toArray();
    }
}