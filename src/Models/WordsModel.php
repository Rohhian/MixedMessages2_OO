<?php

namespace MixedMessages2\Models;

use MixedMessages2\Database;
use PDO;
use Exception;

class WordsModel {
    public function getAllWordsFromTable($tableName): array {
        $db = new Database();
        
        try {
            $preparedSql = $db->getConnection()->prepare("SELECT col2 FROM $tableName ORDER BY id");
            $preparedSql->execute();
            $result = $preparedSql->fetchAll(PDO::FETCH_COLUMN);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function setWordIntoTable($tableFromPost, $sanitizedWord) {
        $db = new Database();

        try {
            $preparedSql = $db->getConnection()->prepare("INSERT INTO $tableFromPost (col2) VALUES (:sanitizedWord)");
            $preparedSql->execute([':sanitizedWord' => $sanitizedWord]);
            echo json_encode('Entry successful. Added ' . $sanitizedWord);
        } catch (Exception $e) {
            echo str_contains($e->getMessage(), 'Duplicate entry') ? json_encode('Duplicate entry') : json_encode($e->getMessage());
        }
    }
}
