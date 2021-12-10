<?php

class UsersTableController extends Controller
{
    private UsersTableView $view;
    private UserTableModel $model;

    public function __construct($view, $model){
        $this->view = $view;
        $this->model = $model;
    }

    public function actionIndex(){

        $search = $_GET['search'] ?? '';
        $order = $_GET["order"] ?? "Id";

        $sort = "ASC";

        if (isset($_GET["sort"])) {
            $_GET["sort"] == "DESC" ? $sort = "ASC" : $sort = "DESC";
        }

        $data =  $this->model->getUsersTableData($sort, $order, $search);
        $data['sort'] = $sort;
        $data['search'] = $search;
        $this->view->render($data);
    }

    private function sortUserEmail(){

    }

}