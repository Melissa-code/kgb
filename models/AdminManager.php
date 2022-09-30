<?php 
require_once("models/Class/Model.php");
require_once("models/Class/Admin.php");


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
    * Admin profil 
    *
    * @return array $adminProfil
    */
    public function getAdminInformation($email_admin): array {
        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT * FROM Admins WHERE email_admin = :email_admin');
        $req->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
        $req->execute();
        $adminProfil = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $adminProfil; 
    }
    

    /**
    * Admin login
    *
    */
    public function loginDb($email_admin, $password_admin): void {

        // Check if the email_admin exists 
        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT count(*) as numberEmail FROM Admins WHERE email_admin = :email_admin'); 
        $req->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
        $req->execute();
       
        while($email_verification = $req->fetch()){
            // if the email doesn't exist in the DB 
            if($email_verification['numberEmail'] != 1){
                MessagesClass::addAlertMsg("Impossible de vous identifier.", MessagesClass::RED_COLOR); 
                header('location:'.URL."login"); 
                exit();
            }
        }

        // Login 
        $req = $pdo->prepare('SELECT * FROM Admins WHERE email_admin = :email_admin');
        $req->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
        $req->execute();

        while($admin = $req->fetch(PDO::FETCH_ASSOC)) {
            if($password_admin === $admin['password_admin']){

                //To use the session connect anywhere in the website
                $_SESSION['connect'] = 1; 
                $_SESSION['email_admin'] = $admin['email_admin']; 
                header("location:".URL."missions"); 
                exit();
            }
            else {
                MessagesClass::addAlertMsg("Impossible de vous identifier.", MessagesClass::RED_COLOR); 
                header("location:".URL."login"); 
                exit();
            }
        }
        $req->closeCursor();
    } 
        
}