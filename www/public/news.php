<?php

session_start();

require_once __DIR__ . '/../configs/config.php';
require_once ROOT . '/configs/functions.php';
require_once ROOT . '/model/class/News.php';
require_once ROOT . '/model/class/Database.php';

use Model\Class\News;
use Model\Class\Database;
News::setConnection(Database::getInstance());


$data = load_data(['id'], false);
if (check_required_fields($data) || !is_numeric($data['id'])) {
    header('Location: index.php');
}

$news = News::find((int)$data['id']);
if (!$news) {
    header('Location: index.php');
}

$title = 'News - ' . $news->title;
require VIEWS . '/news.tpl.php';