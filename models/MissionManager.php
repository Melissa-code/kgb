<?php
require_once("./models/Model.php");
require_once("./models/Mission.php");

class MissionManager extends Model {

    /**
    * Get all the missions
    *
    * return array $missions
    */
    public function getAll() {
        $missions = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Missions");
        $req->execute();
        //$missions = $req->fetchAll(PDO::FETCH_ASSOC); 
        $data = $req->fetchAll(PDO::FETCH_ASSOC); // pour éviter d'avoir 2 fois les datas retournées
        
        foreach($data as $mission) {
            $missions[] = new Mission($mission);
        }
        
        $req->closeCursor();
        return $missions;

    }

    /**
    * Get one mission only
    *
    * return Mission $mission
    */
    public function get(string $code_mission) {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Missions WHERE code_mission = :code_mission");
        $req->bindValue(':code_mission', $code_mission, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $mission = new Mission($data); 
        //var_dump($mission).'<br>'; 
        return $mission;
    }



}
