<?php 

require_once("models/Class/Model.php");
require_once("models/Class/Type.php");


class TypeManager extends Model {


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


    /**
    * Get one type only
    *
    * @return Type $type
    */
    public function get($name_type) : Type {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Types WHERE name_type = :name_type");
        $req->bindValue(':name_type', $name_type, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $type = new Type($data); 
        $req->closeCursor();
        return $type;
    }


    /**
    * Create a type
    */
    public function createTypeDb(Type $newType): void {
        
        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT count(*) as numberType FROM Types WHERE name_type = :name_type'); 
        $req->bindValue(':name_type', $newType->getName_type(), PDO::PARAM_STR);
        $req->execute();

        while($name_verification = $req->fetch()){
            if($name_verification['numberType'] >= 1){
                header('location:'.URL."createType"); 
                exit();
            }
            else {
                $req = $pdo->prepare("INSERT INTO Types (name_type) VALUES (:name_type)");
                $req->bindValue(":name_type", $newType->getName_type(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
    }


    /**
    * Update a type in the database 
    *
    */
    public function updateTypeDb(Type $type): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Types SET name_type = :name_type WHERE name_type = :oldname_type');
        $req->bindValue(':name_type', $type->getName_type(), PDO::PARAM_STR);
        $req->bindValue(':oldname_type', $type->getOldname_type(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }


    /**
    * Delete a type in the database 
    *
    */
    public function deleteTypeDb(string $name_type): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Types WHERE name_type = :name_type');
        $req->bindValue(':name_type', $name_type, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }



}