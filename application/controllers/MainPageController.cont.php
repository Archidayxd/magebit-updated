<?php

class MainPageController extends Controller
{
    private MainPageView $view;
    private MainPageModel $model;

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
        $data['success'] = false;
        $data['error'] = "";
        // send all data to view
        $this->view->render($data);
    }

    public function postEmail()
    {
        // checks if email is set in post
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            // send email to model for error checking
            $errorCheck = $this->model->checkForError($email);
            $isEmailAdded = false;
            // if in email no error it will add email to db
            if ($errorCheck === NULL){
                $isEmailAdded = $this->model->addEmailToDb($email);
            // if error persist in email it will return error message
            } else{
                $data['error'] = $errorCheck;
            }
            $data['success'] = $isEmailAdded;
            // send all data to view
            $this->view->render($data);
        }

    }
}