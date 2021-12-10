<?php

spl_autoload_register('autoClassLoader');
//spl_autoload_register('autoContrLoader');
spl_autoload_register('autoModelLoader');
spl_autoload_register('autoViewLoader');




function autoViewLoader($className)
{
    $viewFolder = "views/";
    $ext = ".view.php";
    $viewPath = __DIR__.'/'.$viewFolder . $className . $ext;

    if(!file_exists($viewPath)){
        echo $viewPath . " not found";
        return false;
    }

    include_once $viewPath;
}

function autoClassLoader($className)
{
    $classFolder = "classes/";
    $ext = ".class.php";
    $classPath = $classFolder . $className . $ext;

    if(!file_exists($classPath)){
        return false;
    }

    include_once $classPath;
}

function autoModelLoader($className)
{
    $modelFolder = "models/";
    $ext = ".model.php";
    $modelPath = $modelFolder . $className . $ext;

    if(!file_exists($modelPath)){
        return false;
    }

    include_once $modelPath;
}

//function autoContrLoader($className)
//{
//    $contrFolder = "controllers/";
//    $ext = ".php";
//    $modelPath = $contrFolder . $className . $ext;
//
//    if(!file_exists($modelPath)){
//        return false;
//    }
//
//    include_once $modelPath;
//}


