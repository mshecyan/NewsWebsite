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


$data = load_data(['id', 'title', 'announce', 'text'], true);
$errors = check_required_fields($data);
if ($errors || !is_numeric($data['id'])) {
    $_SESSION['errors'] = array_values($errors);
    $_SESSION['edited'] = $data;
    header('Location: /admin/edit.php');
    die;
}

$news = new News();
$news->id = (int)$data['id'];
$news->title = $data['title'];
$news->announce = $data['announce'];
$news->text = $data['text'];
$news->save();

header('Location: /admin/index.php');