<?php

session_start();

require_once __DIR__ . '/../../configs/config.php';
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

if (isset($_SESSION['edited'])) {
    $news = new News();
    $news->id = (int)$_SESSION['edited']['id'];
    $news->title = $_SESSION['edited']['title'];
    $news->announce = $_SESSION['edited']['announce'];
    $news->text = $_SESSION['edited']['text'];
    unset($_SESSION['edited']);
} else {
    if (!is_numeric($data['id'])) {
        header('Location: index.php?page=' . $current_page);
        die;
    }
    
    $news = News::find((int)$data['id']);
}

$title = 'Редактирование';
require_once VIEWS . '/news-edit.tpl.php';