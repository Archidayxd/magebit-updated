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
$usersTableController->actionIndex();



