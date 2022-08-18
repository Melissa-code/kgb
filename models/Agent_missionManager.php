<?php 

require_once("models/Model.php");
require_once("models/Agent_mission.php");


class Agent_missionManager extends Model {

    /**
    * Get all the Agents in all the missions
    *
    * @return array $agents
    */
    public function getAll() : array {
        $agents_missions = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Agents_missions");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
        echo "<pre>";
        //var_dump($data);
        echo"</pre>";

        foreach($data as $agent_mission) {
            $agents_missions[] = new Agent_mission($agent_mission);
        }
        
        $req->closeCursor();
        // echo "<pre>";
        // var_dump($agents_missions); 
        // echo"</pre>";
        return $agents_missions;
    }


}