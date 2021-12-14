<?php

class Dbh{
    private $host = "localhost:3307";
    private $user = "foo";
    private $pass = "bar";
    private $dbName = "emails";

// connection to db

    public function connect()
    {
        // charset set to prevent from mysql injection
        $dsn = 'mysql:host=' . $this->host .';charset=utf8'. ';dbname=' . $this->dbName;
        try {
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
        } catch (PDOException) {
            echo "Connection error";
            exit;
        }
    }
}
?>