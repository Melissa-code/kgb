<?php

require_once("models/Model.php");
require_once("models/Mission.php");


class MissionManager extends Model {

    /**
    * Get all the missions
    *
    * @return array $missions
    */
    public function getAll() : array {
        $missions = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Missions");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); // pour éviter d'avoir 2 fois les datas retournées
        
        foreach($data as $mission) {
            $missions[] = new Mission($mission);
        }
        
        $req->closeCursor();
        return $missions;
    }

    /**
    * Get one mission only
    *
    * @return Mission $mission
    */
    public function get($code_mission) : Mission {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Missions WHERE code_mission = :code_mission");
        $req->bindValue(':code_mission', $code_mission, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        //print_r($data); 
        $mission = new Mission($data); 
        //var_dump($mission); 
        $req->closeCursor();
        return $mission;
    }


    /**
    * Check the rule : the targets can't have the same nationality as the agents
    * id_agents(array)
    * code_targets(array)
    */
    public function checkNationalityTargetDb(Mission $newMission) : bool {

        $code_targets = $newMission->getCode_target();
        $id_agents = $newMission->getId_agent();

        $pdo = $this->getDb();

        foreach($id_agents as $id_agent){
            foreach($code_targets as $code_target)  {
                $req1 = $pdo->prepare('SELECT nationality_target FROM Targets WHERE code_target = :code_target');
                $req1->bindValue(':code_target', $code_target, PDO::PARAM_STR);
                $req1->execute();

                $req2= $pdo->prepare('SELECT nationality_agent FROM Agents WHERE id_agent = :id_agent');
                $req2->bindValue(':id_agent', $id_agent, PDO::PARAM_INT);
                $req2->execute();

                $data1 = $req1->fetch();
                $data2 = $req2->fetch(); 

                if($data1['nationality_target'] != $data2['nationality_agent']){
                    return false;
                }
            }
        }
        $req1->closeCursor();
        $req2->closeCursor();
        return true;
    }

    /**
    * Check the rule : the nationality of the contacts must be the same as the country of a mission 
    * code_contacts(array)
    * code_mission (string)
    */
    public function checkNationalityContactDb(Mission $newMission): bool {

        $code_contacts = $newMission->getCode_contact();
        $country_mission = $newMission->getCountry_mission();

        $pdo = $this->getDb();
        foreach($code_contacts as $code_contact){
            $req = $pdo->prepare('SELECT nationality_contact FROM Contacts WHERE code_contact = :code_contact');
            $req->bindValue(':code_contact', $code_contact, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch();
    
            if($data['nationality_contact'] != $country_mission){
                return true;
            }
        }
        $req->closeCursor();
        return false; 
    }


    /**
    * Check the rule : the country of a hideout must be the same as the country of a mission 
    * id_hideout (array)
    * code_mission (string)
    */
    public function checkCountryHideoutDb(Mission $newMission) : bool {

        $id_hideouts = $newMission->getId_hideout();
        $country_mission = $newMission->getCountry_mission();

        $pdo = $this->getDb();
        foreach($id_hideouts as $id_hideout){
            $req = $pdo->prepare('SELECT country_hideout FROM Hideouts WHERE id_hideout = :id_hideout');
            $req->bindValue(':id_hideout', $id_hideout, PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetch();
        
            if($data['country_hideout'] != $country_mission) {
                return true;
            }
        }
        $req->closeCursor();
        return false; 
    }
 

    /**
    * Create a mission
    *
    * 
    */
    public function createMissionDb(Mission $newMission): void {

        $test = "test";
        echo $test;
        var_dump($newMission->getDescription_mission());

        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT count(*) as numberCode FROM Missions WHERE code_mission = :code_mission'); 
        $req->bindValue(':code_mission', $newMission->getCode_mission(), PDO::PARAM_STR);
        $req->execute();
       
        while($code_verification = $req->fetch()){
            if($code_verification['numberCode'] >= 1){
                // header('location:'.URL."createSpeciality"); 
                // exit();
                echo "doublon<br> ";
            
            }
            else {
           echo "mission créée";
   
            $req = $pdo->prepare("INSERT INTO Missions (code_mission, title_mission, description_mission, country_mission, id_duration, code_status, name_type, name_speciality) VALUES (:code_mission, :title_mission, :description_mission, :country_mission, :id_duration, :code_status, :name_type, :name_speciality)");
            $req->bindValue(':code_mission', $newMission->getCode_mission(), PDO::PARAM_STR);
            $req->bindValue(':title_mission', $newMission->getTitle_mission(), PDO::PARAM_STR);
            $req->bindValue(':description_mission', $newMission->getDescription_mission(), PDO::PARAM_STR);
            $req->bindValue(':country_mission', $newMission->getCountry_mission(), PDO::PARAM_STR);
            $req->bindValue(':id_duration', $newMission->getId_duration(), PDO::PARAM_INT);
            $req->bindValue(':code_status', $newMission->getCode_status(), PDO::PARAM_STR);
            $req->bindValue(':name_type', $newMission->getName_type(), PDO::PARAM_STR);
            $req->bindValue(':name_speciality', $newMission->getName_speciality(), PDO::PARAM_STR);
            $req->execute();

            $id_agent = $newMission->getId_agent();
            print_r('id de l agent: ' .$id_agent);
            foreach($id_agent as $agent){
                $req2 = $pdo->prepare("INSERT INTO Agents_missions (id_agent, code_mission) VALUES (:id_agent, :code_mission)");
                $req2->bindValue(':id_agent', (int)$agent, PDO::PARAM_INT);
                $req2->bindValue(':code_mission', $newMission->getCode_mission(), PDO::PARAM_STR);
                $req2->execute();

                // print_r($id_agent);echo "<br>";
                // print_r($agent); echo "<br>";
                // print_r(gettype($agent)); 
            }

            $code_contact = $newMission->getCode_contact(); 
            foreach($code_contact as $contact) {
                $req3 = $pdo->prepare("INSERT INTO Contacts_missions (code_contact, code_mission) VALUES (:code_contact, :code_mission)");
                $req3->bindValue(':code_contact', $contact, PDO::PARAM_STR);
                $req3->bindValue(':code_mission', $newMission->getCode_mission(), PDO::PARAM_STR);
                $req3->execute();
            }

            $code_target = $newMission->getCode_target(); 
            foreach($code_target as $target) {
                $req4 = $pdo->prepare("INSERT INTO Targets_missions (code_target, code_mission) VALUES (:code_target, :code_mission)");
                $req4->bindValue(':code_target', $target, PDO::PARAM_STR);
                $req4->bindValue(':code_mission', $newMission->getCode_mission(), PDO::PARAM_STR);
                $req4->execute();
            }

            $id_hideout = $newMission->getId_hideout(); 
            foreach($id_hideout as $hideout) {
                $req5 = $pdo->prepare("INSERT INTO Hideouts_missions (id_hideout, code_mission) VALUES (:id_hideout, :code_mission)");
                $req5->bindValue(':id_hideout', $hideout, PDO::PARAM_INT);
                $req5->bindValue(':code_mission', $newMission->getCode_mission(), PDO::PARAM_STR);
                $req5->execute();
            }
            
            $req->closeCursor();
         }
         }
        //}
    }

    /**
    * Update a mission
    *
    * 
    */
    public function updateMissionDb(Mission $mission): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Missions SET code_mission = :code_mission, title_mission = :title_mission, description_mission = :description_mission, country_mission = :country_mission, id_duration = :id_duration, code_status = :code_status, name_type = :name_type WHERE code_mission = :code_mission');
        $req->bindValue(':code_mission', $mission->getCode_mission(), PDO::PARAM_STR);
        $req->bindValue(':title_mission', $mission->getTitle_mission(), PDO::PARAM_STR);
        $req->bindValue(':description_mission', $mission->getDescription_mission(), PDO::PARAM_STR);
        $req->bindValue(':country_mission', $mission->getCountry_mission(), PDO::PARAM_STR);
        $req->bindValue(':id_duration', $mission->getId_duration(), PDO::PARAM_INT);
        $req->bindValue(':code_status', $mission->getCode_status(), PDO::PARAM_STR);
        $req->bindValue(':name_type', $mission->getName_type(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }

    /**
    * Delete a mission
    *
    * 
    */
    public function deleteMissionDb(string $code_mission): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Missions WHERE code_mission = :code_mission');
        $req->bindValue(':code_mission', $code_mission, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }

}
