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
            return true;
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            return false;
        }

//        $this->connect() = null;
    }
}