<?php

namespace MixedMessages2\Controllers;

use MixedMessages2\Models\WordsAPI;

class MainController {
    public function __construct() {
        echo $_SERVER['REQUEST_METHOD'] === 'GET' ? json_encode($this->sendResponseToFrontend()) : null;
        $_SERVER['REQUEST_METHOD'] === 'POST' ? (new WordsAPI())->setWord() : die();
    }

    private function getAllWordsFromDatabase(): array {
        return (new WordsAPI())->getWords();
    }

    private function getWeatherData(): array {
        return (new GetWeatherDataController())->getWeatherData();
    }

    private function combineWordsAndWeatherData(): array {
        return array_merge($this->getAllWordsFromDatabase(), $this->getWeatherData());
    }

    private function sendResponseToFrontend(): array {
        return $this->combineWordsAndWeatherData();
    }
}
