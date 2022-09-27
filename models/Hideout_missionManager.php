<?php 

require_once("models/Class/Model.php");
require_once("models/Class/Hideout_mission.php");


class Hideout_missionManager extends Model {

    /**
    * Get all the hideouts & all the missions
    *
    * @return array $hideouts_missions
    */
    public function getAll() : array {
        $hideouts_missions = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Hideouts_missions");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 

        foreach($data as $hideout_mission) {
            $hideouts_missions[] = new Hideout_mission($hideout_mission);
        }
        $req->closeCursor();
        return $hideouts_missions;
    }

}