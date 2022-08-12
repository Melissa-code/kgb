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




}