<?php

class MainPageModel extends Models{

    private Dbh $dbh;

    public function __construct($dbh){
        $this->dbh = $dbh;
    }

    public function checkForError($email){
        if (preg_match("/\w+@\w+\.co$/", $email)){
            return  "We are not accepting subscriptions from Colombia emails";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return  "Please provide a valid e-mail address";
        }
        return NULL;
    }

    public function addEmailToDb($email){
                try {
                    $sql = "INSERT INTO `email`(`email`) VALUES ('$email')";
                    $this->dbh->connect()->exec($sql);
                    return true;
                } catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                    return false;
                }
    }
}