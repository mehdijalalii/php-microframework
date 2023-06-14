<?php

namespace Core;

use PDO;

class DB
{
    private static $db;

    public static function get(): PDO
    {
        if (isset(self::$db)) {
            return self::$db;
        }

        $config = Config::all();

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        self::$db = new PDO($dsn, $config['username'], $config['password'], $options);

        return self::$db;
    }
}
