<?php

require_once __DIR__ . '/includes/class-autoload.php';

// setup all connections
$dbh = new Dbh();
$mainPageView = new MainPageView();
$usersTableView = new UsersTableView();
$usersTableModel = new UserTableModel($dbh);
$mainPageModel = new MainPageModel($dbh);
$mainPageController = new MainPageController($mainPageView, $mainPageModel);
$usersTableController = new UsersTableController($usersTableView, $usersTableModel);

require_once __DIR__. '/includes/route.inc.php';


