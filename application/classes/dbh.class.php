<?php

class Dbh
{
    private $host = "localhost:3307";
    private $user = "foo";
    private $pass = "bar";
    private $dbName = "emails";


    public function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';charset=utf8' . ';dbname=' . $this->dbName;
        try {
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException) {
            echo "Connection error";
            exit;
        }
    }
}

?>