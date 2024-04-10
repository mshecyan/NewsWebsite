<?php

session_start();

require_once __DIR__ . '/../../configs/config.php';
$params = require_once ROOT . '/configs/params.php';
require_once ROOT . '/configs/functions.php';


$data = load_data(['username', 'password'], true);
$errors = check_required_fields($data);
if ($errors) {
    $_SESSION['errors'] = array_values($errors);
} else if (!login($data)) {
    $_SESSION['errors'] = ['Неверый логин или пароль'];
} else {
    header('Location: /admin/index.php');
    die;
}

header('Location: /login.php');