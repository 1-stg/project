<?php

namespace App\Core;

use PDO;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection()
    {
        if (self::$connection != null) {
            return self::$connection;
        } else {
            $driver = 'mysql';
            $host = 'localhost';
            $port = '3306';
            $dbName = 'work_demo';

            $dsn = "$driver:host=$host;port=$port;dbname=$dbName";

            self::$connection = new PDO($dsn, 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);

            return self::$connection;
        }
    }
}
