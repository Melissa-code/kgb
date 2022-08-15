<?php 
require_once("models/Model.php");
require_once("models/Duration.php");

class DurationManager extends Model{

    /**
    * Get all the durations
    *
    * @return array $durations
    */
    public function getAll() : array {
        $durations = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Durations");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); // pour éviter d'avoir 2 fois les datas retournées
        
        foreach($data as $duration) {
            $durations[] = new Duration($duration);
        }
        
        $req->closeCursor();
        return $durations;
    }


    /**
    * Get one duration only
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
    * Create a duration
    */
    public function createDurationDb(Duration $newDuration): void {
        $idDuration = (int)$_POST['id_duration']; 

        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT count(*) as numberId FROM Durations WHERE id_duration = :id_duration'); 
        $req->bindValue(':id_duration', $idDuration, PDO::PARAM_INT);
        $req->execute();
       
        while($id_verification = $req->fetch()){
            // Check if the id is already in the DB
            if($id_verification['numberId'] >= 1){
                header('location:'.URL."createDuration"); 
                exit();
            //echo "Cet identifiant existe déjà"; 
            }
        }
      
        $req = $pdo->prepare("INSERT INTO Durations (id_duration, start_duration, end_duration) VALUES (:id_duration, :start_duration, :end_duration)");
        $req->bindValue(":id_duration", $newDuration->getId_duration(), PDO::PARAM_INT);
        $req->bindValue(":start_duration", $newDuration->getStart_duration(), PDO::PARAM_STR);
        $req->bindValue(":end_duration", $newDuration->getEnd_duration(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }


    /**
    * Update a duration
    */
    public function updateDurationDb(Duration $duration): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Durations SET id_duration = :id_duration');
        $req->bindValue(':id_duration', $duration->getId_duration(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }


    /**
    * Delete a duration
    */
    public function deleteDurationDb(string $id_duration): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Durations WHERE id_duration = :id_duration');
        $req->bindValue(':id_duration', $id_duration, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }


}