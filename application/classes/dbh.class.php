<?php

class Dbh{
    private $host = "localhost:3307";
    private $user = "foo";
    private $pass = "bar";
    private $dbName = "emails";

    public function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        try {
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException) {
            echo "Error appeared in connection";
            exit;
        }
    }
}
?>