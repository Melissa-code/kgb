<?php

abstract class Model {

    private static $pdo; 

    // Get DB Connection in $pdo
    private static function setDb() {

        $url = getenv('JAWSDB_URL');

        if($url) {
            $dbparts = parse_url($url);

            $hostname = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $database = ltrim($dbparts['path'],'/');
        }
        else {
            $hostname = 'localhost';
            $username = 'melissa';
            $password = 'melissa'; 
            $database = 'project_kgb';
        }

        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
            // set the PDO error mode to exception
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // Make the DB connection 
    protected function getDb() {
        if(self::$pdo === null) {
            self::setDb();
        }
        return self::$pdo;
    }

}