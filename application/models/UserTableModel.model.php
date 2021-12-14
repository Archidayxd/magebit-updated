<?php


class UserTableModel extends Models
{
    private Dbh $dbh;

    // get connection to db
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function getUsersTableData($sort, $order, $search, $domain, $page): array
    {
        // start from specific page
        $startFrom = ($page - 1) * 10;

        // main sql query to list all emails
        $sql = "SELECT * FROM email WHERE CONCAT(email) LIKE '%$search%' AND CONCAT(email) LIKE '%$domain%' ORDER BY $order $sort LIMIT $startFrom, 10";
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

    public function generateCsv($ids)
    {
        $ids = implode(', ', $ids);
        $sql = "SELECT * FROM email WHERE Id IN ($ids)";
        $stmh = $this->dbh->connect()->prepare($sql);
        $stmh->execute([]);
        $result = $stmh->fetchAll();
        $fp = fopen('php://output', 'w');
        // input all selected emails in csv
        foreach ($result as $i => $row) {
            fputcsv($fp, $row);
        }
    }

    public function getByDomain()
    {
        // get all emails
        $sql = "SELECT email FROM email";
        $stmt = $this->dbh->connect()->prepare($sql);
        $stmt->execute([]);
        $emails = $stmt->fetchAll();
        // creating empty array with domains
        $domains = [];
        // for each email:
        for ($i = 0; $i < count($emails); $i++) {
            // seperate email name from domain
            $filter = explode('@', $emails[$i]['email']);
            // add @ symbol
            $domain = '@' . $filter[1];
            // push domain to domain array
            array_push($domains, $domain);
            // make all letter lowercase after first letter make upper
            $domains[$i] = ucfirst(strtolower($domains[$i]));
        }
        // store in array only unique domains / if duplicate persist > delete it
        foreach (array_diff_assoc($domains, array_unique($domains)) as $key => $value) {
            unset($domains[$key]);
        }
        return $domains;
    }

    public function pagesCount()
    {
        // count how many id's in db
        $sql = "SELECT COUNT(Id) AS total FROM email";
        $stmt = $this->dbh->connect()->prepare($sql);
        $stmt->execute([]);
        $emails = $stmt->fetchAll();
        $emails = $emails['0']['total'];
        // count / 10 to show count of pages
        return ceil($emails / 10);
    }

}
