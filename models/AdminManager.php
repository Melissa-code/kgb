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
    * Profil Admin
    *
    * @return array $adminProfil
    */
    public function getAdminInformation($email_admin): array {
        $pdo = $this->getDb();
        $req = $pdo->prepare('SELECT * FROM Admins WHERE email_admin = :email_admin');
        $req->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
        $req->execute();
        $adminProfil = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($adminProfil); 
        $req->closeCursor();
        return $adminProfil; 
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
        $req->execute();
       
        while($email_verification = $req->fetch()){
            // si l'email n'existe pas en DB 
            if($email_verification['numberEmail'] != 1){
                header('location:'.URL."login"); 
                exit();
                //echo "Impossible de vous authentifier"; 
            }
        }

        // Connexion 
        $req = $pdo->prepare('SELECT * FROM Admins WHERE email_admin = :email_admin');
        $req->bindValue(':email_admin', $email_admin, PDO::PARAM_STR);
        $req->execute();

        while($admin = $req->fetch(PDO::FETCH_ASSOC)) {
            if($password_admin === $admin['password_admin']){

                $_SESSION['connect'] = 1; //pour l'utiliser partout dans le site
                $_SESSION['email_admin'] = $admin['email_admin'];  
                
                if(isset($_POST['rememberMe'])) {
                    setcookie('auth', $admin['secret'], time() + 364*24*3600, '/', null, false, true); 
                    //$this->getCookie();
                }

                // echo "connexion réussie";
                header('location:'.URL."missions"); 
              
            }
            else {
                //echo "Impossible de vous authentifier"; 
                header('location:'.URL."login"); 
                exit();
            }
        }
        $req->closeCursor();
    } 


    /**
    * Get cookie 
    * 
    * 
    */
    public function getCookie(): void {

        if(isset($_COOKIE['auth']) && !isset($_SESSION['connect'])){

            $secret_admin = htmlspecialchars($_COOKIE['auth']);
        
            $pdo = $this->getDb();
            // vérifie si admin a un secret 
            $req = $pdo->prepare('SELECT count(*) as numberAccount FROM Admins WHERE secret_admin = :secret_admin'); 
            $req->bindValue(':secret_admin', $secret_admin, PDO::PARAM_STR);
            //echo $secret_admin; 
            $req->execute();
    
            while($admin = $req->fetch()){

                // si un compte possède cette clé secrète 
                if((int)$admin['numberAccount'] === 1){
                    $reqAdmin = $pdo->prepare('SELECT * FROM Admins WHERE secret_admin = :secret_admin'); 
                    $reqAdmin->execute();
                 
                    while($adminAccount = $reqAdmin->fetch()){
                        $_SESSION['connect'] = 1; 
                        $_SESSION['email_admin'] = $adminAccount['email_admin']; 
                    }
                    $reqAdmin->closeCursor();
                }
            }
            $req->closeCursor();
        }
    }


        
}