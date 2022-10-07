<?php

abstract class Model {

    private static $pdo; 

    // Get DB Connection in $pdo
    private static function setDb() {
        self::$pdo = new PDO("mysql:host=localhost;dbname=project_kgb;charset=utf8", "melissa", "melissa");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //rapport erreurs  
    }

    // Make the DB connection 
    protected function getDb() {
        if(self::$pdo === null) {
            self::setDb();
        }
        return self::$pdo;
    }

}