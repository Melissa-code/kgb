<?php
require_once("models/Model.php");
require_once("models/Mission.php");

class MissionManager extends Model {

    /**
    * Get all the missions
    *
    * return array $missions
    */
    public function getAll() : array {
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
   
    public function get($code_mission) : Mission {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Missions WHERE code_mission = :code_mission");
        $req->bindValue(':code_mission', $code_mission, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        //print_r($data); 
        $mission = new Mission($data); 
        //var_dump($mission); 
        $req->closeCursor();
        return $mission;
    }

    /**
    * Create a mission
    *
    * 
    */
    public function createMissionDb($newMission): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("INSERT INTO Missions (code_mission, title_mission, description_mission, country_mission, id_duration, code_status, name_type) VALUES (:code_mission, :title_mission, :description_mission, :country_mission, :id_duration, :code_status, :name_type)");
        $req->bindValue(':code_mission', $newMission->getCode_mission(), PDO::PARAM_STR);
        $req->bindValue(':title_mission', $newMission->getTitle_mission(), PDO::PARAM_STR);
        $req->bindValue(':description_mission', $newMission->getDescription_mission(), PDO::PARAM_STR);
        $req->bindValue(':country_mission', $newMission->getCountry_mission(), PDO::PARAM_STR);
        $req->bindValue(':id_duration', $newMission->getId_duration(), PDO::PARAM_INT);
        $req->bindValue(':code_status', $newMission->getCode_status(), PDO::PARAM_STR);
        $req->bindValue(':name_type', $newMission->getName_type(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }

    /**
    * Update a mission
    *
    * 
    */
    public function updateMissionDb(Mission $mission): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Missions SET code_mission = :code_mission, title_mission = :title_mission, description_mission = :description_mission, country_mission = :country_mission, id_duration = :id_duration, code_status = :code_status, name_type = :name_type WHERE code_mission = :code_mission');
        $req->bindValue(':code_mission', $mission->getCode_mission(), PDO::PARAM_STR);
        $req->bindValue(':title_mission', $mission->getTitle_mission(), PDO::PARAM_STR);
        $req->bindValue(':description_mission', $mission->getDescription_mission(), PDO::PARAM_STR);
        $req->bindValue(':country_mission', $mission->getCountry_mission(), PDO::PARAM_STR);
        $req->bindValue(':id_duration', $mission->getId_duration(), PDO::PARAM_INT);
        $req->bindValue(':code_status', $mission->getCode_status(), PDO::PARAM_STR);
        $req->bindValue(':name_type', $mission->getName_type(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }


    public function deleteMissionDb(string $code_mission): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Missions WHERE code_mission = :code_mission');
        $req->bindValue(':code_mission', $code_mission, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();

       
    }

}
