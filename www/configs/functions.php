<?php

function dump($value): void
{
    echo '<pre>' . print_r($value, true) . '</pre>';
}

function dumpdie($value): never
{
    echo '<pre>' . print_r($value, true) . '</pre>';
    die;
}

function clear_str(string $str): string
{
    $str = strip_tags($str);
    $str = trim($str);

    return $str;
}

function load_data(array $fillable, bool $post): array
{
    $load_data = ($post) ? $_POST : $_GET;
    $data = [];

    foreach ($fillable as $field) {
        $data[$field] = (isset($load_data[$field])) ? clear_str($load_data[$field]) : '';
    }

    return $data;
}

function check_required_fields(array $data): array
{
    $errors = [];

    foreach ($data as $key => $value) {
        if (empty($value)) $errors[] = "Не заполнено поле {$key}";
    }

    return $errors;
}

function login(array $data): bool
{
    global $params;

    if ($data['username'] !== $params['ADMIN_LOGIN'] ||
        $data['password'] !== $params['ADMIN_PASSWORD']) {
            return false;
        }

    $_SESSION['user']['username'] = $params['ADMIN_LOGIN'];
    return true;
}

function check_auth(): bool
{
    return isset($_SESSION['user']);
}

function get_errors(): string
{
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
        return require VIEWS . '/alert_danger.tpl.php';
    }

    return '';
}