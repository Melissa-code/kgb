<?php 

require_once("models/Class/Model.php");
require_once("models/Class/Speciality.php");


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
        
        foreach($data as $speciality) {
            $specialities[] = new Speciality($speciality);
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

        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT count(*) as numberName FROM Specialities WHERE name_speciality = :name_speciality'); 
        $req->bindValue(':name_speciality', $newSpeciality->getName_speciality(), PDO::PARAM_STR);
        $req->execute();
       
        while($name_verification = $req->fetch()){
            if($name_verification['numberName'] >= 1){
                // Display an error alert message 
                $_SESSION['alertDuplicateSpeciality'] = [
                    "type" => "error",
                    "msg" => "ERREUR : ce nom existe déjà."
                ];
                header('location:'.URL."createSpeciality"); 
                exit();
            }
            else {
                $req = $pdo->prepare("INSERT INTO Specialities (name_speciality) VALUES (:name_speciality)");
                $req->bindValue(":name_speciality", $newSpeciality->getName_speciality(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
        // Display a success alert message 
        $_SESSION['alertCreateSpeciality'] = [
            "type" => "success",
            "msg" => "La spécialité a bien été créée."
        ];
}


    /**
    * Update a speciality in the database 
    *
    */
    public function updateSpecialityDb(Speciality $speciality): void {

        $pdo = $this->getDb();

        // Check if the name_speciality already exists
        $req = $pdo->prepare("SELECT count(*) as numberName FROM Specialities WHERE name_speciality = :name_speciality"); 
        $req->bindValue(':name_speciality', $speciality->getName_speciality(), PDO::PARAM_STR);
        $req->execute();

        while($name_verification = $req->fetch()){
            if($name_verification['numberName'] >= 1 ) {
                // Display an error alert message 
                $_SESSION['alertDuplicateSpeciality'] = [
                    "type" => "error",
                    "msg" => "ERREUR : ce nom existe déjà."
                ];
                header('location:'.URL."updateSpeciality?q=".$speciality->getOldname_speciality());
                exit();
            }
            else {
                // Update the speciality in the database 
                $req = $pdo->prepare('UPDATE Specialities SET name_speciality = :name_speciality WHERE name_speciality = :oldname_speciality');
                $req->bindValue(':name_speciality', $speciality->getName_speciality(), PDO::PARAM_STR);
                $req->bindValue(':oldname_speciality', $speciality->getOldname_speciality(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
        // Display a success alert message 
        $_SESSION['alertUpdateSpeciality'] = [
            "type" => "success",
            "msg" => "La spécialité a bien été modifiée."
        ];
    }

    /**
    * Delete a speciality in the database 
    *
    */
    public function deleteSpecialityDb(string $name_speciality): void {

        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Specialities WHERE name_speciality = :name_speciality');
        $req->bindValue(':name_speciality', $name_speciality, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }

}