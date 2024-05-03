<?php

namespace MixedMessages2\Controllers;

use MixedMessages2\Database;
use PDO;

class GetWordsController {
    private array $data;

    public function __construct() {
        $this->data[0] = $this->getTableData($_ENV['TABLE_ADJECTIVES']);
        $this->data[1] = $this->getTableData($_ENV['TABLE_NOUNS']);
        $this->data[2] = $this->getTableData($_ENV['TABLE_VERBS']);
        $this->data[3] = $this->getTableData($_ENV['TABLE_WHO']);
    }

    private function getTableData($tablename): array {
        $db = new Database();
        $preparedSql = $db->getConnection()->prepare("SELECT col2 FROM $tablename ORDER BY id");
        $preparedSql->execute();
        $result = $preparedSql->fetchAll(PDO::FETCH_COLUMN);
        return array_map('htmlspecialchars', $result);
    }

    public function getWords(): array {
        return $this->data;
    }
}
