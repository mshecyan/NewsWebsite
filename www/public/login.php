<?php

session_start();

require_once __DIR__ . '/../configs/config.php';
require_once ROOT . '/configs/functions.php';


if (check_auth()) {
    header('Location: /admin/index.php');
    die;
}


$title = 'Авторизация';
require_once VIEWS . '/login.tpl.php';
