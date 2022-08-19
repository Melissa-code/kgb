<?php 

require_once("models/Model.php");
require_once("models/Speciality_agent.php");


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
        //echo "<pre>"; var_dump($data);echo"</pre>";

        foreach($data as $speciality_agent) {
            $specialities_agents[] = new Speciality_agent($speciality_agent);
        }
        
        $req->closeCursor();
        //echo "<pre>"; var_dump($agents_missions); echo"</pre>";
        return $specialities_agents;
    }


}