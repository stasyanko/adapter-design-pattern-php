<?php

namespace App\Adapters\Weather;

use GuzzleHttp\ClientInterface;
use InvalidArgumentException;

class OpenweathermapAdapter implements WeatherProviderInterface
{
    private ClientInterface $client;
    private string $apiKey;

    public function __construct(
        ClientInterface $client,
        string $apiKey
    )
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function currentWeather(float $lat, float $lon): ?WeatherDataDto
    {
        $response = $this->client->request(
            'GET',
            "https://api.openweathermap.org/data/2.5/weather?units=metric&lat={$lat}&lon={$lon}&appid={$this->apiKey}",
            ['http_errors' => false]
        );

        if ($response->getStatusCode() === 400) {
            throw new InvalidArgumentException('Lat or lng are wrong');
        }

        if ($response->getStatusCode() !== 200) {
            return null;
        }
        $data = json_decode($response->getBody()->getContents());

        return new WeatherDataDto(
            $data->weather[0]->description,
            $data->main->temp,
            $data->main->pressure,
            $data->main->humidity,
        );
    }
}
