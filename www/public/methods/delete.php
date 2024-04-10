<?php

session_start();

require_once __DIR__ . '/../../configs/config.php';
$params = require_once ROOT . '/configs/params.php';
require_once ROOT . '/configs/functions.php';
require_once ROOT . '/model/class/News.php';
require_once ROOT . '/model/class/Database.php';

use Model\Class\News;
use Model\Class\Database;
News::setConnection(Database::getInstance());


if (!check_auth()) {
    header('Location: /login.php');
    die;
}


$current_page = 1;
$data = load_data(['id', 'page'], false);
if (is_numeric($data['page'])) {
    $current_page = (int)$data['page'];
}

if (is_numeric($data['id'])) {
    News::delete((int)$data['id']);
}

header('Location: /admin/index.php?page=' . $current_page);