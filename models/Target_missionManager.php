<?php 
require_once("models/Class/Model.php");
require_once("models/Class/Target_mission.php");


class Target_missionManager extends Model {

    /**
    * Get all the Targets in all the missions
    *
    * @return array $targets_missions
    */
    public function getAll() : array {
        $targets_missions = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Targets_missions");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 

        foreach($data as $target_mission) {
            $targets_missions[] = new Target_mission($target_mission);
        }
        
        $req->closeCursor();
        return $targets_missions;
    }

}