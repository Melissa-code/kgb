<?php
require_once("./models/Model.php");
require_once("./models/Mission.php");

class MissionManager extends Model {

    /**
    * Get all the missions
    *
    * return array
    */
    public function getAll() {
        $missions = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Missions");
        $req->execute();
        //$missions = $req->fetchAll(PDO::FETCH_ASSOC); // pour éviter d'avoir 2 fois les datas retournées
        $data = $req->fetchAll(PDO::FETCH_ASSOC); // pour éviter d'avoir 2 fois les datas retournées
        
        foreach($data as $mission) {
            $missions[] = new Mission($mission);
        }
        
        $req->closeCursor();
        return $missions;

    }
}