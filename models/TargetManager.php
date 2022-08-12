<?php 

require_once("models/Model.php");
require_once("models/Target.php");


class TargetManager extends Model {

    /**
    * Get all the targets
    *
    * @return array $targets
    */
    public function getAll() : array {
        $targets = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Targets");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($data as $target) {
            $targets[] = new Target($target);
        }
        
        $req->closeCursor();
        return $targets;
    }


}