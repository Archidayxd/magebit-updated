<?php

class MainPageModel extends Models{

    private Dbh $dbh;

    public function __construct($dbh){
        $this->dbh = $dbh;
    }
    public function addEmailToDb($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (!preg_match("/\w+@\w+\.co$/", $email)) {
                try {
                    $sql = "INSERT INTO `email`(`email`) VALUES ('$email')";
                    $this->dbh->connect()->exec($sql);
                    return true;
                } catch (PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                    return false;
                }
            } else{
               return "We are not accepting subscriptions from Colombia emails";
            }
        } else{
           return "Please provide a valid e-mail address";
        }
    }
}