<?php 

require_once("models/Class/Model.php");
require_once("models/Class/Status.php");


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
    * Create a status in the database function 
    *
    */
    public function createStatusDb(Status $newStatus): void {

        $pdo = $this->getDb();

        // Check if the code_status already exists
        $req = $pdo->prepare('SELECT count(*) as numberCode FROM Status WHERE code_status = :code_status'); 
        $req->bindValue(':code_status', $newStatus->getCode_status(), PDO::PARAM_STR);
        $req->execute();

        while($code_verification = $req->fetch()){
            if($code_verification['numberCode'] >= 1){
                // Display an error alert message 
                $_SESSION['alertDuplicateStatus'] = [
                    "type" => "error",
                    "msg" => "ERREUR : ce code existe déjà."
                ];
                header('location:'.URL.'createStatus'); 
                exit();
            }
            else {
                $req = $pdo->prepare("INSERT INTO Status (code_status) VALUES (:code_status)");
                $req->bindValue(":code_status", $newStatus->getCode_status(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
        // Display a success alert message 
        $_SESSION['alertUpdateStatus'] = [
            "type" => "success",
            "msg" => "Le statut a bien été créé."
        ];
    }


    /**
    * Update a status in the database 
    *
    */
    public function updateStatusDb(Status $status): void {
    
        $pdo = $this->getDb();

        // Check if the code_status already exists
        $req = $pdo->prepare("SELECT count(*) as numberCode FROM Status WHERE code_status = :code_status"); 
        $req->bindValue(':code_status', $status->getCode_status(), PDO::PARAM_STR);
        $req->execute();

        while($code_verification = $req->fetch()){
            if($code_verification['numberCode'] >= 1 ) {
                // Display an error alert message 
                $_SESSION['alertDuplicateStatus'] = [
                    "type" => "error",
                    "msg" => "ERREUR : ce code existe déjà."
                ];
                header("location:".URL."updateStatus?q=".$status->getOldcode_status());
                exit();
            }
            else {
                // Update the status in the database 
                $req = $pdo->prepare('UPDATE Status SET code_status = :code_status WHERE code_status = :oldcode_status');
                $req->bindValue(':code_status', $status->getCode_status(), PDO::PARAM_STR);
                $req->bindValue(':oldcode_status', $status->getOldcode_status(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
        // Display a success alert message 
        $_SESSION['alertUpdateStatus'] = [
            "type" => "success",
            "msg" => "Le statut a bien été modifié."
        ];
    }

    
    /**
    * Delete a status in the database 
    *
    */
    public function deleteStatusDb(string $code_status): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Status WHERE code_status = :code_status');
        $req->bindValue(':code_status', $code_status, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
        // Display a success alert message 
        $_SESSION['alertDeleteStatus'] = [
            "type" => "success", 
            "msg" => "Suppression du statut bien réalisée."
        ]; 
    }

}