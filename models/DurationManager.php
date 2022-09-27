<?php 
require_once("controllers/MessagesClass.php");
require_once("models/Class/Model.php");
require_once("models/Class/Duration.php");

class DurationManager extends Model{

    
    /**
    * Get all the durations function
    *
    * @return array $durations 
    */
    public function getAll() : array {
        $durations = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Durations");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($data as $duration) {
            $durations[] = new Duration($duration);
        }
        $req->closeCursor();
        return $durations;
    }


    /**
    * Get one duration only function
    *
    * @return Duration $duration
    */
    public function get($id_duration) : Duration {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Durations WHERE id_duration = :id_duration");
        $req->bindValue(':id_duration', $id_duration, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $duration = new Duration($data); 
        $req->closeCursor();
        return $duration;
    }


    /**
    * Create a duration in the database function
    *
    */
    public function createDurationDb(Duration $newDuration): void {

        $pdo = $this->getDb();

         // Count the duplicates in the DB 
        $req = $pdo->prepare(
            'SELECT
                (SELECT count(*) as numberId FROM Durations WHERE id_duration = :id_duration),
                (SELECT count(*) as numberStart FROM Durations  WHERE start_duration = :start_duration),
                (SELECT count(*) as numberEnd FROM Durations  WHERE end_duration = :end_duration)
            '); 
        $req->bindValue(':id_duration', $newDuration->getId_duration(), PDO::PARAM_INT);
        $req->bindValue(':start_duration', $newDuration->getStart_duration(), PDO::PARAM_STR);
        $req->bindValue(':end_duration', $newDuration->getEnd_duration(), PDO::PARAM_STR);
        $req->execute();

        // Check if the duration already exists
        while($verification = $req->fetch()){
            if($verification[0] >= 1 || ($verification[1] >= 1 && $verification[2] >= 1)) {
                MessagesClass::addAlertMsg("ERREUR : cette durée existe déjà.", MessagesClass::RED_COLOR); 
                header("location:".URL."createDuration"); 
                exit();
            }
            else {
                // Create the duration in the database 
                $req = $pdo->prepare("INSERT INTO Durations (id_duration, start_duration, end_duration) VALUES (:id_duration, :start_duration, :end_duration)");
                $req->bindValue(":id_duration", $newDuration->getId_duration(), PDO::PARAM_INT);
                $req->bindValue(":start_duration", $newDuration->getStart_duration(), PDO::PARAM_STR);
                $req->bindValue(":end_duration", $newDuration->getEnd_duration(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
        // Display a success alert message 
        MessagesClass::addAlertMsg("La durée a bien été créée.", MessagesClass::GREEN_COLOR); 
    }


    /**
    * Update a duration in the database function 
    *
    */
    public function updateDurationDb(Duration $duration): void {

        $pdo = $this->getDb();
        $req = $pdo->prepare('UPDATE Durations SET id_duration = :id_duration, start_duration = :start_duration, end_duration = :end_duration WHERE id_duration = :oldid_duration');
        $req->bindValue(':id_duration', $duration->getId_duration(), PDO::PARAM_INT);
        $req->bindValue(':oldid_duration', $duration->getOldid_duration(), PDO::PARAM_INT);
        $req->bindValue(':start_duration', $duration->getStart_duration(), PDO::PARAM_STR);
        $req->bindValue(':end_duration', $duration->getEnd_duration(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
        // Display a sucess message 
        MessagesClass::addAlertMsg("La durée a bien été modifiée.", MessagesClass::GREEN_COLOR); 
    }


    /**
    * Delete a duration in the database function
    *
    */
    public function deleteDurationDb(string $id_duration): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Durations WHERE id_duration = :id_duration');
        $req->bindValue(':id_duration', $id_duration, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
        // Display a success alert message 
        MessagesClass::addAlertMsg("La durée a bien été supprimée.", MessagesClass::GREEN_COLOR); 
    }
}