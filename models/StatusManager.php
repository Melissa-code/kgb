<?php 
require_once("models/Model.php");
require_once("models/Status.php");

class StatusManager extends Model {


    /**
    * Get all the status 
    *
    * @return array $status
    */
    public function getAll() : array {
        $status = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Status");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); // pour éviter d'avoir 2 fois les datas retournées
        
        foreach($data as $oneStatus) {
            $status[] = new Status($oneStatus);
        }
        
        $req->closeCursor();
        return $status;
    }








}