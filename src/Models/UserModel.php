<?php

namespace MixedMessages2\Models;

use MixedMessages2\Database;
use PDO;
use Exception;

class UserModel {
    public function getUser($email, $password) {
        $db = new Database();
        
        try {
            $preparedSql = $db->getConnection()->prepare("SELECT * FROM users WHERE email = :email AND pass = :pass");
            $preparedSql->execute(['email' => $email, 'pass' => $password]);
            $result = $preparedSql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
