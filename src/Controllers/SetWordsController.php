<?php

namespace MixedMessages2\Controllers;

use Exception;
use MixedMessages2\Database;

class SetWordsController {
    public function __construct() {
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
