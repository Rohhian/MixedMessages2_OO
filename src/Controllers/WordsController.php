<?php

namespace MixedMessages2\Controllers;

use MixedMessages2\Database;
use MixedMessages2\Models\WordsModel;
use Exception;

class WordsController {
    private array $allowedTableNames;
    private WordsModel $wordsModel;

    public function __construct(WordsModel $wordsModel) {
        $this->allowedTableNames = [$_ENV['TABLE_ADJECTIVES'], $_ENV['TABLE_NOUNS'], $_ENV['TABLE_VERBS'], $_ENV['TABLE_WHO']];
        $this->wordsModel = $wordsModel;
    }

    private function isValidTableName(string $tableName): bool {
        return !in_array($tableName, $this->allowedTableNames) ? false : true;
    }

    private function sanitizeWord(string $wordFromPost): string {
        return preg_replace('/[^a-zA-Z-]/', '', $wordFromPost);
    }

    private function handleHtmlSpecialChars(array $returnData): array {
        foreach ($returnData as $key => $array) {
            $returnData[$key] = array_map('htmlspecialchars', $array);
        }
        return $returnData;
    }

    public function getWords(): array {
        $returnData[0] = $this->isValidTableName($_ENV['TABLE_ADJECTIVES']) ? $this->wordsModel->getAllTableData($_ENV['TABLE_ADJECTIVES']) : die();
        $returnData[1] = $this->isValidTableName($_ENV['TABLE_NOUNS']) ? $this->wordsModel->getAllTableData($_ENV['TABLE_NOUNS']) : die();
        $returnData[2] = $this->isValidTableName($_ENV['TABLE_VERBS']) ? $this->wordsModel->getAllTableData($_ENV['TABLE_VERBS']) : die();
        $returnData[3] = $this->isValidTableName($_ENV['TABLE_WHO']) ? $this->wordsModel->getAllTableData($_ENV['TABLE_WHO']) : die();
        
        return $this->handleHtmlSpecialChars($returnData);
    }

    public function setWord(string $tableFromPost, string $wordFromPost) {
        echo !$this->isValidTableName($tableFromPost) ? json_encode('Wrong table name') : null;
        echo empty(trim($wordFromPost)) ? json_encode('Don\'t send empty strings') : null;

        if (!$this->isValidTableName($tableFromPost) || empty(trim($wordFromPost))) {
            return;
        }

        $sanitizedWord = $this->sanitizeWord($wordFromPost);

        $this->wordsModel->setWordIntoTable($tableFromPost, $sanitizedWord);
    }
}
