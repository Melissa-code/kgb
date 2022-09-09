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


                $id_agent = $pdo->lastInsertId();
                $name_speciality = $newAgent->getName_speciality(); 

                foreach($name_speciality as $speciality) {
                    $req2 = $pdo->prepare("INSERT INTO Specialities_agents (name_speciality, id_agent) VALUES (:name_speciality, :id_agent)");
                    $req2->bindValue(':name_speciality', $speciality, PDO::PARAM_STR);
                    $req2->bindValue(':id_agent', $id_agent, PDO::PARAM_INT);
                    $req2->execute();
                }
                
                $req->closeCursor();
            }
       }
   }

    
    /**
    * Update an agent in the database
    *
    */
    public function updateAgentDb(Agent $agent): void {

        $oldname_specialities = $_POST['oldname_speciality'];
        $name_specialities = $_POST['name_speciality'];
     
        $oldid_agent =$_POST['oldid_agent'];

        $pdo = $this->getDb();
        $req = $pdo->prepare('UPDATE Agents SET id_agent = :id_agent, name_agent = :name_agent, firstname_agent = :firstname_agent, datebirthday_agent = :datebirthday_agent, nationality_agent = :nationality_agent WHERE id_agent = :oldid_agent');
        $req->bindValue(':id_agent', $agent->getOldid_agent(), PDO::PARAM_INT);
        $req->bindValue(':oldid_agent', $agent->getOldid_agent(), PDO::PARAM_INT);
        $req->bindValue(':name_agent', $agent->getName_agent(), PDO::PARAM_STR);
        $req->bindValue(':firstname_agent', $agent->getFirstname_agent(), PDO::PARAM_STR);
        $req->bindValue(':datebirthday_agent', $agent->getDatebirthday_agent(), PDO::PARAM_STR);
        $req->bindValue(':nationality_agent', $agent->getNationality_agent(), PDO::PARAM_STR);
        $req->execute();

        if(count($oldname_specialities) === count($name_specialities)) {
            foreach($name_specialities as $name_speciality) {
                foreach($oldname_specialities as $oldname_speciality) {
                   
                    $req2 = $pdo->prepare('UPDATE Specialities_agents SET name_speciality = :name_speciality, id_agent = :id_agent WHERE id_agent = :oldid_agent');
                    $req2->bindValue(':name_speciality', $name_speciality, PDO::PARAM_STR);
                    $req2->bindValue(':id_agent', $agent->getOldid_agent(), PDO::PARAM_INT);
                    $req2->bindValue(':oldid_agent', $agent->getOldid_agent(), PDO::PARAM_INT);
                    $req2->execute();
                   
                }
            }
        }
        // elseif(count($oldname_specialities) !== count($name_specialities) && count($name_specialities) > count($oldname_specialities)) {
        //     foreach($name_specialities as $name_speciality) {
        //         foreach($oldname_specialities as $oldname_speciality) {
        //             if($name_speciality !== $oldname_speciality) {
        //                 $req3 = $pdo->prepare("INSERT INTO Specialities_agents (name_speciality, id_agent) VALUES (:name_speciality, :id_agent)");
        //                 $req3->bindValue(":name_speciality", $name_speciality, PDO::PARAM_STR);
        //                 $req3->bindValue(":id_agent", $agent->getOldid_agent(), PDO::PARAM_INT);
        //                 $req3->execute();
        //             }
        //         }
        //     }
        // } 

        
        $req->closeCursor();
        //$req2->closeCursor();
        // $req3->closeCursor();
    }


    /**
    * Delete an agent in the database
    *
    */
    public function deleteAgentDb(int $id_agent): void {

        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Agents WHERE id_agent = :id_agent');
        $req->bindValue(':id_agent', $id_agent, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }

}