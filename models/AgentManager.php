<?php 

require_once("models/Model.php");
require_once("models/Agent.php");


class AgentManager extends Model {

    /**
    * Get all the Agents
    *
    * @return array $agents
    */
    public function getAll() : array {
        $agents = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Agents");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($data as $agent) {
            $agents[] = new Agent($agent);
        }
        
        $req->closeCursor();
        return $agents;
    }


}