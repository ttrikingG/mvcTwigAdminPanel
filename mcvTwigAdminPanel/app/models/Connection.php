<?php

namespace app\models;

use app\classes\Bind;
use PDO;
use PDOException;

class Connection
{
    private static $pdo = null;

    public static function connect()
    {
        $config = (object) Bind::get('config')->database;

        try {
            if(!static::$pdo){
                static::$pdo = new PDO(
                "mysql:host=$config->host; dbname=$config->dbname; charset=$config->charset",
                $config->username,
                $config->password,
                $config->options);
            }

            return static::$pdo;
        }catch(PDOException $e){
            var_dump($e->getMessage());
        }
    }
}