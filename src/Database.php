<?php

namespace MixedMessages2;

use PDO;

class Database {
    private string $dbHost;
    private string $dbUser;
    private string $dbPassword;
    private string $dbName;

    public function __construct() {
        $this->dbHost = $_ENV['DB_HOST'];
        $this->dbUser = $_ENV['DB_USER'];
        $this->dbPassword = $_ENV['DB_PASSWORD'];
        $this->dbName = $_ENV['DB_NAME'];
    }

    public function getConnection(): PDO {
        return new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPassword);
    }
}
