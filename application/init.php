<?php

// include all classes with autoload
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/includes/class-autoload.inc.php';

// setup all connections
$dbh = new Dbh();
$mainPageView = new MainPageView();
$usersTableView = new UsersTableView();
$usersTableModel = new UserTableModel($dbh);
$mainPageModel = new MainPageModel($dbh);
$mainPageController = new MainPageController($mainPageView, $mainPageModel);
$usersTableController = new UsersTableController($usersTableView, $usersTableModel);

// require route
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/includes/route.inc.php';


