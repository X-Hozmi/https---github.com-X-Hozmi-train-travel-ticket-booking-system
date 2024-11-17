<?php

namespace Src\Infrastructure\Databases;

use PDO;
use PDOException;

class DatabaseConnection
{
    private static ?PDO $instance = null;

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            require_once __DIR__ . '/../../Application/Helpers/Helpers.php';
            $config = include __DIR__ . '/../Configs/database.php';
            try {
                self::$instance = new PDO(
                    "{$config['connection']}:host={$config['host']};dbname={$config['database']}",
                    $config['username'],
                    $config['password']
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
