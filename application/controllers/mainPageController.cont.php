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
            $errorCheck = $this->model->checkForError($email);
            $isEmailAdded = false;
            if ($errorCheck === NULL){
                $isEmailAdded = $this->model->addEmailToDb($email);
            } else{
                $data['error'] = $errorCheck;
            }
            $data['success'] = $isEmailAdded;
            $this->view->render($data);
        }

    }
}