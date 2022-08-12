<?php 

require_once("models/Model.php");
require_once("models/Speciality.php");


class SpecialityManager extends Model {

    /**
    * Get all the specialities
    *
    * @return array specialities
    */
    public function getAll() : array {
        $specialities = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Specialities");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($data as $specialitie) {
            $specialities[] = new Speciality($specialitie);
        }
        
        $req->closeCursor();
        return $specialities;
    }


}