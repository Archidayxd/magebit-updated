<?php

class MainPageModel extends Models
{

    private Dbh $dbh;

    // get connection with database
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    // check email for error
    public function checkForError($email)
    {
        // if emails end on .co
        if (preg_match("/\w+@\w+\.co$/", $email)) {
            return "We are not accepting subscriptions from Colombia emails";
        }
        // if email is not valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Please provide a valid e-mail address";
        }
        // return null if no errors
        return NULL;
    }
    // add email to db
    public function addEmailToDb($email)
    {
        try {
            $sql = "INSERT INTO `email`(`email`) VALUES ('$email')";
            $this->dbh->connect()->exec($sql);
            return true;
            // show error in connection
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            return false;
        }
    }
}