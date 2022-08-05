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
   
    public function get($code_mission) {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Missions WHERE code_mission = :code_mission");
        $req->bindValue(':code_mission', $code_mission, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $mission = new Mission($data); 
        //var_dump($mission); 
        $req->closeCursor();
        return $mission;
    }

    /**
    * Create a mission
    *
    * return Mission $mission
    */
    public function createMission($code_mission, $title_mission, $description_mission, $country_mission, $id_duration, $code_status, $name_type) {
        $missions = [];
        $pdo = $this->getDb();
        $req = $pdo->prepare("INSERT INTO Missions (code_mission, title_mission, description_mission, country_mission, id_duration, code_status, name_type) VALUES (:code_mission, :title_mission, :description_mission, :country_mission, :id_duration, :code_status, :name_type)");
        $req->bindValue(':code_mission', $code_mission, PDO::PARAM_STR);
        $req->bindValue(':title_mission', $title_mission, PDO::PARAM_STR);
        $req->bindValue(':description_mission', $description_mission, PDO::PARAM_STR);
        $req->bindValue(':country_mission', $country_mission, PDO::PARAM_STR);
        $req->bindValue(':id_duration', $id_duration, PDO::PARAM_STR);
        $req->bindValue(':code_status', $code_status, PDO::PARAM_STR);
        $req->bindValue(':name_type', $name_type, PDO::PARAM_STR);
        $result = $req->execute();
        $req->closeCursor();

        if($result > 0) {
            $mission = new Mission($this->getDb());
            // $this->array_push($mission, )
            $this->missions[] = $mission;
        }
        var_dump($mission);
    }



}
