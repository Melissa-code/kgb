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


    /**
    * Get one hideout only
    * @return Hideout $hideout
    */
    public function get($id_hideout) : Hideout {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Hideouts WHERE id_hideout = :id_hideout");
        $req->bindValue(':id_hideout', (int)$id_hideout, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch(); 
        $hideout = new Hideout($data); 
        $req->closeCursor();
        return $hideout;
    }


    /**
    * Create a hideout
    */
    public function createHideoutDb(Hideout $newHideout): void {

        $pdo = $this->getDb();
        $req = $pdo->prepare(
            'SELECT
                (SELECT count(*) as numberId FROM Hideouts WHERE id_hideout = :id_hideout),
                (SELECT count(*) as numberAddress FROM Hideouts WHERE address_hideout = :address_hideout),
                (SELECT count(*) as numberCountry FROM Hideouts WHERE country_hideout = :country_hideout),
                (SELECT count(*) as numberType FROM Hideouts WHERE type_hideout = :type_hideout)
            '); 
        $req->bindValue(':id_hideout', $newHideout->getId_hideout(), PDO::PARAM_INT);
        $req->bindValue(':address_hideout', $newHideout->getAddress_hideout(), PDO::PARAM_STR);
        $req->bindValue(":country_hideout", $newHideout->getCountry_hideout(), PDO::PARAM_STR);
        $req->bindValue(":type_hideout", $newHideout->getType_hideout(), PDO::PARAM_STR);
        $req->execute();
 
        while($verification = $req->fetch()) {
            if($verification[0] >= 1 || ($verification[1] >= 1 && $verification[2] >= 1 && $verification[3] >= 1 )) {
                header('location:'.URL."createHideout"); 
                exit();
            }
            else {     
                $req = $pdo->prepare("INSERT INTO Hideouts (id_hideout, address_hideout, country_hideout, type_hideout) VALUES (:id_hideout, :address_hideout, :country_hideout, :type_hideout)");
                $req->bindValue(":id_hideout", $newHideout->getId_hideout(), PDO::PARAM_INT);
                $req->bindValue(":address_hideout", $newHideout->getAddress_hideout(), PDO::PARAM_STR);
                $req->bindValue(":country_hideout", $newHideout->getCountry_hideout(), PDO::PARAM_STR);
                $req->bindValue(":type_hideout", $newHideout->getType_hideout(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
             }
         }
    }

    
    /**
    * Update a hideout 
    */
    public function updateHideoutsDb(Hideout $hideout): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Hideouts SET id_hideout = :id_hideout');
        $req->bindValue(':id_hideout', (int)$hideout->getId_hideout(), PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }


    /**
    * Delete a hideout 
    */
    public function deleteHideoutDb(int $id_hideout): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Hideouts WHERE id_hideout = :id_hideout');
        $req->bindValue(':id_hideout', $id_hideout, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }



}