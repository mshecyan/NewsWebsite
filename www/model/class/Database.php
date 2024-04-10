<?php

namespace Model\Class;

use PDO;
require_once __DIR__ . '/../../configs/config.php';

final class Database
{
    private static $instance = null;

    public static function getInstance()
    {
        return self::$instance ?? self::$instance = self::getPDO();
    }

    private static function getPDO(): PDO
    {
        $dbConfig = parse_ini_file(ROOT . '/configs/db_config.ini');
        $dsn = "pgsql:host={$dbConfig['Host']};port={$dbConfig['Port']};dbname={$dbConfig['DbName']}";

        return new PDO($dsn, $dbConfig['User'], $dbConfig['Password']);
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}