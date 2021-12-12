<?php

abstract class View
{
    protected abstract function getLayoutName();

    public function render($data){
        if (is_array($data)){
            extract($data);
        }
        include __DIR__.'/../views/'.$this->getLayoutName();
    }

    public  function showMainPage(){
        include __DIR__.'/../views/'.$this->getLayoutName();
    }
}



