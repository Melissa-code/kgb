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
    

    /**
    * Get one target only
    *
    * @return Target $target
    */
    public function get($code_target) : Target {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Targets WHERE code_target = :code_target");
        $req->bindValue(':code_target', $code_target, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $target = new Target($data); 
        $req->closeCursor();
        return $target;
    }


    /**
    * Create a target in the database 
    *
    */
    public function createTargetDb(Target $newTarget): void {

        $pdo = $this->getDb();
        $req = $pdo->prepare(
            'SELECT
                (SELECT count(*) as numberCode FROM Targets WHERE code_target = :code_target),
                (SELECT count(*) as numberName FROM Targets WHERE name_target = :name_target),
                (SELECT count(*) as numberFirstname FROM Targets WHERE firstname_target = :firstname_target),
                (SELECT count(*) as numberDatebirthday FROM Targets WHERE datebirthday_target = :datebirthday_target),
                (SELECT count(*) as numberNationality FROM Targets WHERE nationality_target = :nationality_target)
            '); 
        $req->bindValue(':code_target', $newTarget->getCode_target(), PDO::PARAM_STR); 
        $req->bindValue(':name_target', $newTarget->getName_target(), PDO::PARAM_STR);
        $req->bindValue(':firstname_target', $newTarget->getFirstname_target(), PDO::PARAM_STR);
        $req->bindValue(":datebirthday_target", $newTarget->getDatebirthday_target(), PDO::PARAM_STR);
        $req->bindValue(":nationality_target", $newTarget->getNationality_target(), PDO::PARAM_STR);
        $req->execute();
 
        while($verification = $req->fetch()){
            if($verification[0] >= 1 || ($verification[1] >= 1 && $verification[2] >= 1 && $verification[3] >= 1 && $verification[4] >= 1)) {
                header('location:'.URL."createTarget"); 
                exit();
            }
            else {    
                $req = $pdo->prepare("INSERT INTO Targets (code_target, name_target, firstname_target, datebirthday_target, nationality_target) VALUES (:code_target, :name_target, :firstname_target, :datebirthday_target, :nationality_target)");
                $req->bindValue(":code_target", $newTarget->getCode_target(), PDO::PARAM_STR);
                $req->bindValue(":name_target", $newTarget->getName_target(), PDO::PARAM_STR);
                $req->bindValue(":firstname_target", $newTarget->getFirstname_target(), PDO::PARAM_STR);
                $req->bindValue(":datebirthday_target", $newTarget->getDatebirthday_target(), PDO::PARAM_STR);
                $req->bindValue(":nationality_target", $newTarget->getNationality_target(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
    }

    
    /**
    * Update a target in the database 
    *
    */
    public function updateTargetDb(Target $target): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Targets SET code_target = :code_target, name_target = :name_target, firstname_target = :firstname_target, datebirthday_target = :datebirthday_target, nationality_target = :nationality_target WHERE code_target = :oldcode_target');
        $req->bindValue(':code_target', $target->getCode_target(), PDO::PARAM_STR);
        $req->bindValue(':oldcode_target', $target->getOldcode_target(), PDO::PARAM_STR);
        $req->bindValue(':name_target', $target->getName_target(), PDO::PARAM_STR);
        $req->bindValue(':firstname_target', $target->getFirstname_target(), PDO::PARAM_STR);
        $req->bindValue(':datebirthday_target', $target->getDatebirthday_target(), PDO::PARAM_STR);
        $req->bindValue(':nationality_target', $target->getNationality_target(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }


    /**
    * Delete a target in the database 
    *
    */
    public function deleteTargetDb(string $code_target): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Targets WHERE code_target = :code_target');
        $req->bindValue(':code_target', $code_target, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }

}