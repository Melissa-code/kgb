<?php

abstract class Model {

    private static $pdo; // connexion à DB 


    // Recupérer connexion à DB - connexion va etre placée dans $pdo
    private static function setDb() {
    self::$pdo = new PDO("mysql:host=localhost;dbname=app_kgb;charset=utf8", "root", "root");
    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //rapport erreurs  
    }

    // Faire la connexion à la DB 
    protected function getDb() {
        if(self::$pdo === null) {
            self::setDb();
        }
        return self::$pdo;
    }

}