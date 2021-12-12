<?php

class MainPageController extends Controller{

    private MainPageView $view;
    private MainPageModel $model;

    public function __construct($view, $model)
    {
        $this->view = $view;
        $this->model = $model;
    }

    public function index(){
        $this->view->render([]);
    }

    public function getEmail(){
        if (isset($_POST['email'])){
            $email = $_POST['email'];
            $this->model->addEmailToDb($email);
        }

    }
}