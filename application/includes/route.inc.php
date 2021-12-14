<?php

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