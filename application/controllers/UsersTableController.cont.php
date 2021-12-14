<?php

class UsersTableController extends Controller
{
    private UsersTableView $view;
    private UserTableModel $model;

    public function __construct($view, $model)
    {
        // get connection with view
        $this->view = $view;
        // get connection with model
        $this->model = $model;
    }

    public function index()
    {
        // set by default
        $search = $_GET['search'] ?? '';
        $order = $_GET["order"] ?? "Id";
        $domain = $_GET["domain"] ?? '';
        $page  = $_GET["page"] ?? '1';

        $sort = "ASC";

        // checks what type of sorting isset
        if (isset($_GET["sort"])) {
            $_GET["sort"] == "DESC" ? $sort = "ASC" : $sort = "DESC";
        }
        // send to model all data to get users from db and display it
        $data = $this->model->getUsersTableData($sort, $order, $search ,$domain, $page);
        $domains = $this->model->getByDomain();
        $totalPages = $this->model->pagesCount();
        $data['total'] = $totalPages;
        $data['page'] = $page;
        $data['sort'] = $sort;
        $data['search'] = $search;
        $data['domains'] = $domains;
        $data['domain'] = $domain;
        // send to view
        $this->view->render($data);
    }

    public function deleteEmail()
    {
        // checks if any email need to delete
        if (isset($_GET['Id'])) {
            $id = $_GET['Id'];
            // send specific id to model for delete
            $this->model->deleteEmail($id);
        }
        // refresh
        $this->index();
    }

    public function downloadCsv()
    {
        // if any email is set in checkboxes
        if (isset($_GET['xport'])) {
            $ids = $_GET['xport'];
            // if isset > send ids of this emails to model
            $this->model->generateCsv($ids);
            // prepare file name for download
            $fileName = "emails_list.csv";
            header('Content-type: application/csv');
            header('Content-Disposition: attachment; filename=' . $fileName);
        } else {
            echo "No data is selected " . "<a href='/users'>BACK</a>";
        }
    }
}