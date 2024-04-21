<?php

namespace MixedMessages2\Controllers;

use Exception;
use MixedMessages2\Database;

class SetWordsController {
    public function __construct() {
        $db = new Database();

        $table = $_POST['table'];
        $word = $_POST['word'];

        if ($table != ('adjectives' || 'nouns' || 'verbs' || 'who')) {
            echo json_encode("Wrong table name");
        } elseif ($word == '') {
            echo json_encode("Don't send empty strings");
        } else {
            $sanitizedObj = preg_replace('/[^a-zA-Z-]/', '', $word);
            try {
                $preparedSql = $db->getConnection()->prepare(
                    "INSERT INTO $table (col2) VALUES (:word)"
                );
                $preparedSql->execute([':word' => $sanitizedObj]);
                echo json_encode("Entry successful. Added " . $sanitizedObj);
            } catch (Exception $e) {
                if (str_contains($e->getMessage(), 'Duplicate entry')) {
                    echo json_encode("Duplicate entry");
                } else {
                    echo json_encode($e->getMessage());
                }
            }
        }
    }
}
