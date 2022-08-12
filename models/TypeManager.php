<?php 
require_once("models/Model.php");
require_once("models/Type.php");

class TypeManager extends Model{


    /**
    * Get all the types
    *
    * @return array $types
    */
    public function getAll() : array {
        $types = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Types");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); // pour éviter d'avoir 2 fois les datas retournées
        
        foreach($data as $type) {
            $types[] = new Type($type);
        }
        
        $req->closeCursor();
        return $types;
    }




}