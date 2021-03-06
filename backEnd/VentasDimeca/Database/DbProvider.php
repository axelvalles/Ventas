<?php

namespace VentasDimeca\Database;

use PDO;

class DbProvider
{

    private static $_db;

    public static function get()
    {

        if (!self::$_db) {
            $pdo = new PDO(
                __CONFIG__['db']['host'],
                __CONFIG__['db']['user'],
                __CONFIG__['db']['pass']
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            self::$_db = $pdo;
        }

        return self::$_db;
    }
}
