<?php 

require_once("models/Model.php");
require_once("models/Status.php");


class StatusManager extends Model {

    /**
    * Get all the status 
    * @return array $status
    */
    public function getAll() : array {
        $status = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Status");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($data as $oneStatus) {
            $status[] = new Status($oneStatus);
        }
        
        $req->closeCursor();
        return $status;
    }


    /**
    * Create a status
    */
    public function createStatusDb(Status $newStatus): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("INSERT INTO Status (code_status) VALUES (:code_status)");
        $req->bindValue(":code_status", $newStatus->getCode_status(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }







}