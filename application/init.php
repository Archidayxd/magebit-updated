<?php

//require_once 'class-autoload.include.php';

require_once __DIR__ . '/core/models.php';
require_once __DIR__ . '/core/controller.php';
require_once __DIR__ . '/core/view.php';

require_once __DIR__ . '/classes/dbh.class.php';

require_once __DIR__ . '/controllers/UsersTableController.cont.php';

require_once __DIR__ . '/models/UserTableModel.model.php';

require_once __DIR__ . '/views/usersTableView.view.php';


$dbh = new Dbh();
$usersTableView = new UsersTableView();
$usersTableModel = new UserTableModel($dbh);
$usersTableController = new UsersTableController($usersTableView, $usersTableModel);
//$usersTableController->actionIndex();


$routes = array(
    "/users" => function () use ($usersTableController) {
        $usersTableController->index();
    },
    "/users/delete" => function () use ($usersTableController) {
        $usersTableController->deleteEmail();
    },
    "/users/download" => function () use ($usersTableController) {
        $usersTableController->downloadCsv();
    },
//    "/users/domains" => function () use ($usersTableController) {
//        $usersTableController->sortByDomains();
//    }
);

function route($routes)
{
    foreach ($routes as $path => $view) {
        if ($path == $_SERVER["PATH_INFO"]) {
            $view();
            return;
        }
    }
    header('Location: /users');
}

route($routes);

