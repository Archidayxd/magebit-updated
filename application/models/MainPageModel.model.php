<?php

class MainPageModel extends Models{

    private Dbh $dbh;

    public function __construct($dbh){
        $this->dbh = $dbh;
    }
    public function addEmailToDb($email){
        try {

            $sql = "INSERT INTO `email`(`email`) VALUES ('$email')";
            $this->dbh->connect()->exec($sql);
            header('Location: /users');
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

//        $this->connect() = null;
    }
}