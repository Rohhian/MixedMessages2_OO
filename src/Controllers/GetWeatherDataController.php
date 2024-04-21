<?php

namespace MixedMessages2\Controllers;

use GuzzleHttp\Client;

class GetWeatherDataController {
    private array $data;

    private function getWeatherApiKey(): string {
        return $_ENV['WEATHER_API_KEY'];
    }

    public function __construct() {
        $client = new Client();
        $response0 = $client->get('https://api.openweathermap.org/data/2.5/weather', [
            'query' => ['appid' => $this->getWeatherApiKey(),
                        'id' => '588409',
                        'units' => 'metric'],
        ]);
        $response1 = $client->get('https://api.openweathermap.org/data/2.5/weather', [
            'query' => ['appid' => $this->getWeatherApiKey(),
                        'id' => '3553478',
                        'units' => 'metric'],
        ]);
        $response2 = $client->get('https://api.openweathermap.org/data/2.5/weather', [
            'query' => ['appid' => $this->getWeatherApiKey(),
                        'id' => '794965',
                        'units' => 'metric'],
        ]);
        $response3 = $client->get('https://api.openweathermap.org/data/2.5/weather', [
            'query' => ['appid' => $this->getWeatherApiKey(),
                        'id' => '588157',
                        'units' => 'metric'],
        ]);

        $responseBody0 = $response0->getBody()->getContents();
        $responseBody1 = $response1->getBody()->getContents();
        $responseBody2 = $response2->getBody()->getContents();
        $responseBody3 = $response3->getBody()->getContents();

        $data[0] = json_decode($responseBody0);
        $data[1] = json_decode($responseBody1);
        $data[2] = json_decode($responseBody2);
        $data[3] = json_decode($responseBody3);

        $this->data = $data;
    }

    public function getWeatherData(): array {
        return $this->data;
    }
}
