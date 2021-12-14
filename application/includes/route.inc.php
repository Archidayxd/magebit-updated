<?php

// route system / if in url add array path it will run specific methode
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
    // check if path persist in array
    foreach ($routes as $path => $view) {
        if ($path == $_SERVER["PATH_INFO"]) {
            $view();
            return;
        }
    }
    // if path not found in array > route to home
    header('Location: /home');
}

route($routes);