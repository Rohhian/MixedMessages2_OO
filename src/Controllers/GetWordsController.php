<?php

namespace MixedMessages2\Controllers;

use MixedMessages2\Adjective;
use MixedMessages2\Noun;
use MixedMessages2\Verb;
use MixedMessages2\Who;
use MixedMessages2\Database;
use PDO;

class GetWordsController {
    private array $data;

    public function __construct() {
        $whos = $this->getTableData((new Who())->getTableName());
        $adjectives = $this->getTableData((new Adjective())->getTableName());
        $verbs = $this->getTableData((new Verb())->getTableName());
        $nouns = $this->getTableData((new Noun())->getTableName());

        $data[0] = $adjectives;
        $data[1] = $nouns;
        $data[2] = $verbs;
        $data[3] = $whos;

        $this->data = $data;
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
