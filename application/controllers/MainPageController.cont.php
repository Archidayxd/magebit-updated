<?php

class MainPageController extends Controller
{

    private MainPageView $view;
    private MainPageModel $model;

    public function __construct($view, $model)
    {
        $this->view = $view;
        $this->model = $model;
    }

    public function index()
    {
        $data['success'] = false;
        $data['error'] = "";
        $this->view->render($data);
    }

    public function postEmail()
    {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $isEmailAdded = $this->model->addEmailToDb($email);
            $data['success'] = $isEmailAdded;
            $this->view->render($data);
        }

    }
}