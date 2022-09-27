<?php 
require_once("controllers/MessagesClass.php");
require_once("models/Class/Model.php");
require_once("models/Class/Type.php");


class TypeManager extends Model {

    /**
    * Get all the types function 
    *
    * @return array $types
    */
    public function getAll() : array {
        $types = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Types");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($data as $type) {
            $types[] = new Type($type);
        }
        $req->closeCursor();
        return $types;
    }


    /**
    * Get one type only function 
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
    * Create a type function 
    */
    public function createTypeDb(Type $newType): void {
        
        $pdo = $this->getDb();
        // count the number of duplicates in the DB
        $req = $pdo->prepare('SELECT count(*) as numberType FROM Types WHERE name_type = :name_type'); 
        $req->bindValue(':name_type', $newType->getName_type(), PDO::PARAM_STR);
        $req->execute();

        // Check if the type already exists 
        while($name_verification = $req->fetch()){
            if($name_verification['numberType'] >= 1) {
                MessagesClass::addAlertMsg("ERREUR : ce type existe déjà.", MessagesClass::RED_COLOR); 
                header("location:".URL."createType"); 
                exit();
            }
            else {
                // Create the type in the DB 
                $req = $pdo->prepare("INSERT INTO Types (name_type) VALUES (:name_type)");
                $req->bindValue(":name_type", $newType->getName_type(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
        MessagesClass::addAlertMsg("Le type a bien été créé.", MessagesClass::GREEN_COLOR); 
    }


    /**
    * Update a type function 
    *
    */
    public function updateTypeDb(Type $type): void {

        $pdo = $this->getDb();
        // count the number of duplicates in the DB
        $req = $pdo->prepare('SELECT count(*) as numberType FROM Types WHERE name_type = :name_type'); 
        $req->bindValue(':name_type', $type->getName_type(), PDO::PARAM_STR);
        $req->execute();

        // Check if the type already exists 
        while($name_verification = $req->fetch()){
            if($name_verification['numberType'] >= 1) {
                MessagesClass::addAlertMsg("ERREUR : ce type existe déjà.", MessagesClass::RED_COLOR); 
                header("location:".URL."updateType"); 
                exit();
            }
            else {
                // update the type in the DB 
                $req =$pdo->prepare('UPDATE Types SET name_type = :name_type WHERE name_type = :oldname_type');
                $req->bindValue(':name_type', $type->getName_type(), PDO::PARAM_STR);
                $req->bindValue(':oldname_type', $type->getOldname_type(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
        // Display a success alert message
        MessagesClass::addAlertMsg("Le type a bien été modifié.", MessagesClass::GREEN_COLOR); 
    }


    /**
    * Delete a type function 
    *
    */
    public function deleteTypeDb(string $name_type): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Types WHERE name_type = :name_type');
        $req->bindValue(':name_type', $name_type, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
        // Display a success alert message
        MessagesClass::addAlertMsg("Le type a bien été supprimé.", MessagesClass::GREEN_COLOR); 
    }
}