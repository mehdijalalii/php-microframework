<?php

namespace Core;

class Config
{
    public static array $config;

    public function __construct()
    {
        self::$config = self::loadConfig();
    }

    public static function get(string $key): mixed
    {
        return array_key_exists($key, self::$config)
            ? self::$config[$key]
            : null;
    }

    public static function all(): array
    {
        return self::$config;
    }


    public static function loadConfig(): array
    {
        return include '../app/config.php';
    }
}
