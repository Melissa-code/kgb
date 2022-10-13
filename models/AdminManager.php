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
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
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
     * Get the hash password from the DB 
     *
     * @param string $email_admin
     * @return string
     */
    public function getPasswordAdmin(string $email_admin) {
        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT password_admin FROM Admins WHERE email_admin = :email_admin');
        $req->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result['password_admin']; 
    }


    /**
     * Compare the hash DB password to the Admin typing password 
     *
     * @param string $email_admin
     * @param string $password_admin
     * @return boolean
     */
    public function isCombinationValid(string $email_admin, string $password_admin): bool {
        $passwordDb = $this->getPasswordAdmin($email_admin);
        return password_verify($password_admin, $passwordDb);
    }


    /**
    * Admin login function 
    *
    */
    public function loginDb(string $email_admin): void {

        // Count how many times is the email in the DB to check if it already exists 
        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT count(*) as numberEmail FROM Admins WHERE email_admin = :email_admin'); 
        $req->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
        $req->execute();

        // If the email doesn't exist in the DB, display an error alert 
        while($email_verification = $req->fetch()){
            if($email_verification['numberEmail'] != 1){
                MessagesClass::addAlertMsg("Impossible de vous identifier !!.", MessagesClass::RED_COLOR); 
                header('location:'.URL."login"); 
                exit();
            }
            // Log in the Admin 
            $req2 = $pdo->prepare('SELECT * FROM Admins WHERE email_admin = :email_admin');
            $req2->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
            $req2->execute();

            while($admin = $req2->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['connect'] = 1; 
                $_SESSION['email_admin'] = $admin['email_admin']; 
                echo 'connexion';
                header("location:".URL."missions"); 
                exit();
            }
        }
        $req2->closeCursor();
        $req->closeCursor();
    } 
}