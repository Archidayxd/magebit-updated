<?php

class MainPageController extends Controller{

    private MainPageView $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function showMainPage(){
        $this->view->showMainPage();
    }
}