<?php

namespace Oquiz;

use PDO;

class Database {
    private static $_instance;
    private function __construct() {

        $localDbConfig = parse_ini_file(__DIR__.'/config.conf');

        try {
            $this->dbh = new PDO(
                "mysql:host={$localDbConfig['DB_HOST']};dbname={$localDbConfig['DB_NAME']};charset=utf8",
                $localDbConfig['DB_USERNAME'],
                $localDbConfig['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );
        }
        catch(\Exception $exception) {
            die('Erreur de connexion...' . $exception->getMessage());
        }
    }
    // the unique method you need to use
    public static function getPDO() {
        // If no instance => create one
        if (empty(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance->dbh;
    }
}
