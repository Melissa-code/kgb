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

    
    /**
    * Get one agent only
    * @return Agent $agent
    */
    public function get($id_agent) : Agent {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Agents WHERE id_agent = :id_agent");
        $req->bindValue(':id_agent', $id_agent, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $agent = new Agent($data); 
        $req->closeCursor();
        return $agent;
    }


    /**
    * Create an agent 
    */
    public function createAgentDb(Agent $newAgent): void {

        $pdo = $this->getDb();
        $req = $pdo->prepare(
            'SELECT
                (SELECT count(*) as numberName FROM Agents WHERE name_agent = :name_agent),
                (SELECT count(*) as numberFirstname FROM Agents WHERE firstname_agent = :firstname_agent),
                (SELECT count(*) as numberDatebirthday FROM Agents WHERE datebirthday_agent = :datebirthday_agent),
                (SELECT count(*) as numberNationality FROM Agents WHERE nationality_agent = :nationality_agent)
            '); 
        $req->bindValue(':name_agent', $newAgent->getName_agent(), PDO::PARAM_STR);
        $req->bindValue(':firstname_agent', $newAgent->getFirstname_agent(), PDO::PARAM_STR);
        $req->bindValue(":datebirthday_agent", $newAgent->getDatebirthday_agent(), PDO::PARAM_STR);
        $req->bindValue(":nationality_agent", $newAgent->getNationality_agent(), PDO::PARAM_STR);
        $req->execute();
 
        while($verification = $req->fetch()){
            if($verification[0] >= 1 && $verification[1] >= 1 && $verification[2] >= 1 && $verification[3] >= 1 ){
                header('location:'.URL."createAgent"); 
                exit();
            }
            else {     
                $req = $pdo->prepare("INSERT INTO Agents (name_agent, firstname_agent, datebirthday_agent, nationality_agent) VALUES (:name_agent, :firstname_agent, :datebirthday_agent, :nationality_agent)");
                $req->bindValue(":name_agent", $newAgent->getName_agent(), PDO::PARAM_STR);
                $req->bindValue(":firstname_agent", $newAgent->getFirstname_agent(), PDO::PARAM_STR);
                $req->bindValue(":datebirthday_agent", $newAgent->getDatebirthday_agent(), PDO::PARAM_STR);
                $req->bindValue(":nationality_agent", $newAgent->getNationality_agent(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
    }

    
    /**
    * Update a agent
    */
    public function updateAgentsDb(Agent $agent): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Agents SET id_agent = :id_agent');
        $req->bindValue(':id_agent', (int)$agent->getId_agent(), PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }


    /**
    * Delete a agent
    */
    public function deleteAgentDb(int $id_agent): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Agents WHERE id_agent = :id_agent');
        $req->bindValue(':id_agent', $id_agent, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }






}