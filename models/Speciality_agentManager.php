<?php 

require_once("models/Class/Model.php");
require_once("models/Class/Speciality_agent.php");


class Speciality_agentManager extends Model {

    /**
    * Get all the agents in all the speciality
    *
    * @return array $specialities_agents
    */
    public function getAll() : array {
        $specialities_agents = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Specialities_agents");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 

        foreach($data as $speciality_agent) {
            $specialities_agents[] = new Speciality_agent($speciality_agent);
        }
        $req->closeCursor();
        return $specialities_agents;
    }

}