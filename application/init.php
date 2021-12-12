<?php

//require_once 'class-autoload.include.php';


require_once __DIR__ . '/core/models.php';
require_once __DIR__ . '/core/controller.php';
require_once __DIR__ . '/core/view.php';

require_once __DIR__ . '/classes/dbh.class.php';

require_once __DIR__ . '/controllers/UsersTableController.cont.php';
require_once __DIR__ . '/controllers/MainPageController.cont.php';

require_once __DIR__ . '/models/MainPageModel.model.php';
require_once __DIR__ . '/models/UserTableModel.model.php';

require_once __DIR__ . '/views/usersTableView.view.php';
require_once __DIR__ . '/views/MainPageView.view.php';


$dbh = new Dbh();

$mainPageView = new MainPageView();
$usersTableView = new UsersTableView();
$usersTableModel = new UserTableModel($dbh);
$mainPageModel = new MainPageModel($dbh);
$mainPageController = new MainPageController($mainPageView, $mainPageModel);
$usersTableController = new UsersTableController($usersTableView, $usersTableModel);



$routes = array(
    "/home" => function () use ($mainPageController) {
        $mainPageController->index();
    },
    "/email" => function () use ($mainPageController) {
        $mainPageController->postEmail();
    },
    "/users" => function () use ($usersTableController) {
        $usersTableController->index();
    },
    "/users/delete" => function () use ($usersTableController) {
        $usersTableController->deleteEmail();
    },
    "/users/download" => function () use ($usersTableController) {
        $usersTableController->downloadCsv();
    },
);

function route($routes)
{
    foreach ($routes as $path => $view) {
        if ($path == $_SERVER["PATH_INFO"]) {
            $view();
            return;
        }
    }
    header('Location: /home');
}

route($routes);

