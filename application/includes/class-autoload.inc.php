<?php

spl_autoload_register('autoCoreLoader');
spl_autoload_register('autoClassLoader');
spl_autoload_register('autoContrLoader');
spl_autoload_register('autoViewLoader');
spl_autoload_register('autoModelLoader');

// autoload for core directory

function autoCoreLoader($className)
{
    $coreFolder = $_SERVER['DOCUMENT_ROOT'] . "/application/core/";
    $ext = ".php";
    $classPath = $coreFolder . $className . $ext;

    if(!file_exists($classPath)){
        return false;
    }

    require_once $classPath;
}

// autoload for class directory

function autoClassLoader($className)
{
    $classFolder = $_SERVER['DOCUMENT_ROOT']. "/application/classes/";
    $ext = ".class.php";
    $classPath = $classFolder . $className . $ext;

    if(!file_exists($classPath)){
        return false;
    }

    require_once $classPath;
}

// autoload for model directory

function autoModelLoader($className)
{
    $modelFolder = $_SERVER['DOCUMENT_ROOT']. "/application/models/";
    $ext = ".model.php";
    $modelPath = $modelFolder . $className . $ext;

    if(!file_exists($modelPath)){
        return false;
    }

    require_once $modelPath;
}

// autoload for view directory

function autoViewLoader($className)
{
    $viewFolder = $_SERVER['DOCUMENT_ROOT']. "/application/views/";
    $ext = ".view.php";
    $viewPath = $viewFolder . $className . $ext;

    if(!file_exists($viewPath)){
        return false;
    }

    require_once $viewPath;
}

// autoload for controller directory

function autoContrLoader($className)
{
    $contrFolder = $_SERVER['DOCUMENT_ROOT']. "/application/controllers/";
    $ext = ".cont.php";
    $modelPath = $contrFolder . $className . $ext;

    if(!file_exists($modelPath)){
        return false;
    }

    require_once $modelPath;
}



