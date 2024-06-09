<?php

namespace MixedMessages2\Controllers;

use MixedMessages2\Models\WordsModel;

class MainController {
    public function __construct() {
        echo $_SERVER['REQUEST_URI'] === '/MixedMessages2/getwords' ? json_encode($this->sendResponseToFrontend()) : null;
        $_SERVER['REQUEST_URI'] === '/MixedMessages2/setwords' ? (new WordsController(new WordsModel()))->setWord($_POST['table'], $_POST['word']) : die();
    }

    private function sendResponseToFrontend(): array {
        return $this->combineWordsAndWeatherData();
    }
    
    private function combineWordsAndWeatherData(): array {
        return array_merge($this->getAllWordsFromDatabase(), $this->getWeatherData());
    }

    private function getAllWordsFromDatabase(): array {
        return (new WordsController(new WordsModel()))->getWords();
    }

    private function getWeatherData(): array {
        return (new GetWeatherDataController())->getWeatherData();
    }
}
