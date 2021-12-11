<?php

class UsersTableController extends Controller
{
    private UsersTableView $view;
    private UserTableModel $model;

    public function __construct($view, $model)
    {
        $this->view = $view;
        $this->model = $model;
    }

    public function index()
    {

        $search = $_GET['search'] ?? '';
        $order = $_GET["order"] ?? "Id";

        $sort = "ASC";

        if (isset($_GET["sort"])) {
            $_GET["sort"] == "DESC" ? $sort = "ASC" : $sort = "DESC";
        }

        $data = $this->model->getUsersTableData($sort, $order, $search);
        $data['sort'] = $sort;
        $data['search'] = $search;
        $this->view->render($data);
    }

    public function deleteEmail()
    {
        if (isset($_GET['Id'])) {
            $id = $_GET['Id'];
            $this->model->deleteEmail($id);
        }
        $this->index();
    }

    public function downloadCsv()
    {
        if (isset($_GET['xport'])) {
            $ids = $_GET['xport'];
            $this->model->generateCsv($ids);
            $fileName = "emails_list.csv";
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $fileName);
        } else {
            echo "No data is selected " . "<a href='/users'>BACK</a>";
        }
    }

    private function sortUserEmail()
    {
//testa
    }


}