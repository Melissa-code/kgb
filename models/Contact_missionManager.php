<?php 

require_once("models/Class/Model.php");
require_once("models/Class/Contact_mission.php");


class Contact_missionManager extends Model {

    /**
    * Get all the Contacts in all the missions
    *
    * @return array $contacts_missions
    */
    public function getAll() : array {
        $contacts_missions = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Contacts_missions");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 

        foreach($data as $contact_mission) {
            $contacts_missions[] = new Contact_mission($contact_mission);
        }
        $req->closeCursor();
        return $contacts_missions;
    }


}