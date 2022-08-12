<?php 

require_once("models/Model.php");
require_once("models/Hideout.php");


class HideoutManager extends Model {

    /**
    * Get all the hideouts
    *
    * @return array $hideouts
    */
    public function getAll() : array {
        $hideouts = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Hideouts");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($data as $hideout) {
            $hideouts[] = new Hideout($hideout);
        }
        
        $req->closeCursor();
        return $hideouts;
    }


}