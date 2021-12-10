<?php


class UserTableModel extends Models
{
    private Dbh $dbh;

    public function __construct($dbh){
       $this->dbh = $dbh;
   }

   public function getUsersTableData($sort, $order , $search):array{

       $sql = "SELECT * FROM email WHERE CONCAT(email) LIKE '%$search%' ORDER BY $order $sort";
       $stmt = $this->dbh->connect()->prepare($sql);
       $stmt->execute([]);

       $emails = $stmt->fetchAll();
      return array('emails' => $emails);
   }
}
