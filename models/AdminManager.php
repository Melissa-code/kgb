<?php 

require_once("models/Model.php");
require_once("models/Admin.php");


class AdminManager extends Model {

    /**
    * Get all the Admins
    *
    * @return array $admins
    */
    public function getAll() : array {
        $admins = []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Admins");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); // pour éviter d'avoir 2 fois les datas retournées
        
        foreach($data as $admin) {
            $admins[] = new Admin($admin);
        }
        
        $req->closeCursor();
        return $admins;
    }


    /**
    * Get one Admin only
    *
    * @return Admin $admin
    */
    public function get($id_admin) : Admin {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Admins WHERE id_admin = :id_admin");
        $req->bindValue(':id_admin', $id_admin, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        var_dump($data."<br>"); 
        $admin = new Admin($data); 
        var_dump($admin."<br>"); 
        $req->closeCursor();
        return $admin;
    }

    /**
    * Login Admin
    *
    * 
    */
    public function loginDb($email_admin, $password_admin): void {


        // vérification de l'email_admin 
        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT count(*) as numberEmail FROM Admins WHERE email_admin = :email_admin'); 
        $req->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
        echo $email_admin; 
        $req->execute();
        //$req->execute(array($email_admin));

        while($email_verification = $req->fetch()){
            // si l'email n'existe pas en DB 
            if($email_verification['numberEmail'] != 1){
                //echo "Impossible de vous authentifier"; 
                header('location:'.URL."login"); 
                exit();
            }
        }

        // Connexion 
        $req = $pdo->prepare('SELECT * FROM Admins WHERE email_admin = :email_admin');
        $req->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
        //$req->execute(array($email_admin));
        $req->execute();

        while($admin = $req->fetch()) {
            if($password_admin === $admin['password_admin']){

                $_SESSION['connect'] = 1; 
                $_SESSION['email_admin'] = $admin['email_admin']; 
                echo "connexion réussie "; 
            }
            else {
                echo "Impossible de vous authentifier"; 
                header('location:'.URL."login"); 
                exit();
            }
        }

        $req->closeCursor();
    } 
    
        
}