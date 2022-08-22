<?php 

require_once("models/Model.php");
require_once("models/Hideout_mission.php");


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
        //echo "<pre>"; var_dump($data);echo"</pre>";

        foreach($data as $hideout_mission) {
            $hideouts_missions[] = new Hideout_mission($hideout_mission);
        }
       
        
        $req->closeCursor();
        //echo "<pre>"; var_dump($agents_missions); echo"</pre>";
        return $hideouts_missions;
    }


}