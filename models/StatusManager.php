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
    * Get one status only
    * @return Status $status
    */
    public function get($code_status) : Status {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Status WHERE code_status = :code_status");
        $req->bindValue(':code_status', $code_status, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $status = new Status($data); 
        $req->closeCursor();
        return $status;
    }


    /**
    * Create a status
    */
    public function createStatusDb(Status $newStatus): void {

        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT count(*) as numberCode FROM Status WHERE code_status = :code_status'); 
        $req->bindValue(':code_status', $newStatus->getCode_status(), PDO::PARAM_STR);
        $req->execute();

        while($code_verification = $req->fetch()){
            if($code_verification['numberCode'] >= 1){
                header('location:'.URL."createStatus"); 
                exit();
            }
            else {
                $req = $pdo->prepare("INSERT INTO Status (code_status) VALUES (:code_status)");
                $req->bindValue(":code_status", $newStatus->getCode_status(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
    }


    /**
    * Update a status
    */
    public function updateStatusDb(Status $status): void {
        //var_dump($status->getCode_status());
        $status = $_POST['code_status'];

        $pdo = $this->getDb();
        $req = $pdo->prepare('UPDATE Status SET code_status = :code_status WHERE code_status = :code_status');
        $req->bindValue(':code_status', $status, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }


    /**
    * Delete a status
    */
    public function deleteStatusDb(string $code_status): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare("DELETE FROM Status WHERE code_status = :code_status");
        $req->bindValue(':code_status', $code_status, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }



}