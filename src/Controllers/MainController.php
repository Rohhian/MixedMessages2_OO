<?php

namespace MixedMessages2\Controllers;

class MainController {
    public function __construct() {
        echo $_SERVER['REQUEST_METHOD'] === 'GET' ? json_encode($this->sendResponseToFrontend()) : null;
        $_SERVER['REQUEST_METHOD'] === 'POST' ? new SetWordsController() : die();
    }

    private function getWordsFromDatabase(): array {
        return (new GetWordsController())->getWords();
    }

    private function getWeatherData(): array {
        return (new GetWeatherDataController())->getWeatherData();
    }

    private function combineWordsAndWeatherData(): array {
        return array_merge($this->getWordsFromDatabase(), $this->getWeatherData());
    }

    private function sendResponseToFrontend(): array {
        return $this->combineWordsAndWeatherData();
    }
}
