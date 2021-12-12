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

    public function deleteEmail($id)
    {
        $sql = "DELETE FROM email WHERE Id = '$id'";
        $stmt = $this->dbh->connect()->prepare($sql);
        $stmt->execute([]);
    }

    public function generateCsv($ids){
        $ids = implode(', ', $ids);
        $sql = "SELECT * FROM email WHERE Id IN ($ids)";
        $stmh = $this->dbh->connect()->prepare($sql);
        $stmh->execute([]);
        $result = $stmh->fetchAll();
        $fp = fopen('php://output', 'w');
        foreach ($result as $i => $row) {
            fputcsv($fp, $row);
        }
    }
    public  function getByDomain(){
        $sql = "SELECT email FROM email";
        $stmt = $this->dbh->connect()->prepare($sql);
        $stmt->execute([]);
        $emails = $stmt->fetchAll();
        $domains = [];

        for ($i = 0; $i<count($emails); $i++) {
            $filter = explode('@', $emails[$i]['email']);
            $domain = $filter[1];
            array_push($domains, $domain);
            $domains[$i] = ucfirst(strtolower($domains[$i]));
        }

        foreach (array_diff_assoc($domains, array_unique($domains)) as $key => $value){
            unset($domains[$key]);
        }
        return $domains;
    }

}
