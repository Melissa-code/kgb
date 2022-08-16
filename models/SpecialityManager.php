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


    /**
    * Get one speciality only
    *
    * @return Speciality $speciality
    */
    public function get($name_speciality) : Speciality  {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Specialities WHERE name_speciality = :name_speciality");
        $req->bindValue(':name_speciality', $name_speciality, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $speciality = new Speciality($data); 
        $req->closeCursor();
        return $speciality;
    }


    /**
    * Create a speciality
    */
    public function createSpecialityDb(Speciality $newSpeciality): void {
        $nameSpeciality = $_POST['name_speciality']; 
        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT count(*) as numberName FROM Specialities WHERE name_speciality = :name_speciality'); 
        $req->bindValue(':name_speciality', $nameSpeciality, PDO::PARAM_STR);
        $req->execute();
       
        while($name_verification = $req->fetch()){
            // Check if the name_speciality is already in the DB
            if($name_verification['numberName'] >= 1){
                header('location:'.URL."createSpeciality"); 
                exit();
            }
            else {
                $req = $pdo->prepare("INSERT INTO Specialities (name_speciality, id_agent, code_mission) VALUES (:name_speciality, :id_agent, :code_mission)");
                $req->bindValue(":name_speciality", $newSpeciality->getName_speciality(), PDO::PARAM_STR);
                $req->bindValue(":id_agent", (int)$newSpeciality->getId_agent(), PDO::PARAM_INT);
                $req->bindValue(":code_mission", $newSpeciality->getCode_mission(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
    }


    /**
    * Update a speciality
    */
    public function updateSpecialityDb(Speciality $speciality): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Speciality SET name_speciality = :name_speciality');
        $req->bindValue(':name_speciality', $speciality->getName_speciality(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }


    /**
    * Delete a speciality
    */
    public function deleteSpecialityDb(string $name_speciality): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Specialities WHERE name_speciality = :name_speciality');
        $req->bindValue(':name_speciality', $name_speciality, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }



}