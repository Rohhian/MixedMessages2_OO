<?php

namespace MixedMessages2\Models;

use MixedMessages2\Database;
use PDO;
use Exception;

class WordsAPI {
    private array $data;

    private function getTableData($tablename): array {
        $db = new Database();
        $preparedSql = $db->getConnection()->prepare("SELECT col2 FROM $tablename ORDER BY id");
        $preparedSql->execute();
        $result = $preparedSql->fetchAll(PDO::FETCH_COLUMN);
        return array_map('htmlspecialchars', $result);
    }

    public function getWords(): array {
        $this->data[0] = $this->getTableData($_ENV['TABLE_ADJECTIVES']);
        $this->data[1] = $this->getTableData($_ENV['TABLE_NOUNS']);
        $this->data[2] = $this->getTableData($_ENV['TABLE_VERBS']);
        $this->data[3] = $this->getTableData($_ENV['TABLE_WHO']);
        return $this->data;
    }

    public function setWord() {
        $db = new Database();

        $tableFromPost = $_POST['table'];
        $wordFromPost = $_POST['word'];

        $tableNames = [$_ENV['TABLE_ADJECTIVES'], $_ENV['TABLE_NOUNS'], $_ENV['TABLE_VERBS'], $_ENV['TABLE_WHO']];

        echo !in_array($tableFromPost, $tableNames) ? json_encode("Wrong table name") : null;
        echo $wordFromPost == '' ? json_encode("Don't send empty strings") : null;

        try {
            $sanitizedObj = preg_replace('/[^a-zA-Z-]/', '', $wordFromPost);
            $preparedSql = $db->getConnection()->prepare("INSERT INTO $tableFromPost (col2) VALUES (:wordFromPost)");
            $preparedSql->execute([':wordFromPost' => $sanitizedObj]);
            echo json_encode("Entry successful. Added " . $sanitizedObj);
        } catch (Exception $e) {
            echo str_contains($e->getMessage(), 'Duplicate entry') ? json_encode("Duplicate entry") : json_encode($e->getMessage());
        }
    }
}
