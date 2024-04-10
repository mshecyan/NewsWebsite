<?php

session_start();

require_once __DIR__ . '/../configs/config.php';
$params = require_once ROOT . '/configs/params.php';
require_once ROOT . '/configs/functions.php';
require_once ROOT . '/model/class/News.php';
require_once ROOT . '/model/class/Database.php';

use Model\Class\News;
use Model\Class\Database;
News::setConnection(Database::getInstance());


$page_count = ceil(News::allCount() / $params['MAX_NEWS_COUNT_IN_PAGE']);
if ($page_count == 0) $page_count = 1;

$data = load_data(['page'], false);
if (!is_numeric($data['page'])) {
    header('Location: index.php?page=1');
    die;
}

$current_page = (int)$data['page'];    
if ($current_page <= 0) {
    header('Location: index.php?page=1');
    die;
} else if ($current_page > $page_count) {
    header('Location: index.php?page=' . $page_count);
    die;
}

$news_arr = News::findRange($params['MAX_NEWS_COUNT_IN_PAGE'], ($current_page - 1) * $params['MAX_NEWS_COUNT_IN_PAGE']);
$title = 'News';
require_once VIEWS . '/index.tpl.php';