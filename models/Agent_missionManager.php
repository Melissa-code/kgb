<?php 

require_once("models/Class/Model.php");
require_once("models/Class/Agent_mission.php");


class Agent_missionManager extends Model {

    /**
    * Get all the agents in all the missions
    *
    * @return array $agents
    */
    public function getAll() : array {
        $agents_missions = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Agents_missions");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 

        foreach($data as $agent_mission) {
            $agents_missions[] = new Agent_mission($agent_mission);
        }
        
        $req->closeCursor();
        return $agents_missions;
    }

    /**
    * Get one agent_mission only
    *
    * @return Agent_mission $agent
    */
    public function get($code_mission) : Agent_mission {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Agents_missions WHERE code_mission = :code_mission");
        $req->bindValue(':code_mission', $code_mission, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $agent_mission = new Agent_mission($data); 
        $req->closeCursor();
        //echo "<pre>"; var_dump($agent_mission) ; echo "</pre>";
        return $agent_mission;
    }


}