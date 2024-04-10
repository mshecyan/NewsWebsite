<?php

session_start();

require_once __DIR__ . '/../../configs/config.php';
require_once ROOT . '/configs/functions.php';

if (!check_auth()) {
    header('Location: /login.php');
    die;
}

$current_page = 1;
$title = 'Добавить';
require_once VIEWS . '/news-add.tpl.php';