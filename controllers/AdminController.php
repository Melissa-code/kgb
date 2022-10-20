<?php
require_once("models/AdminManager.php"); 


class AdminController {

    private AdminManager $adminManager;

    public function __construct() {
        $this->adminManager = new AdminManager(); 
    }


    /**
    * Generate a page 
    *
    */
    private function generatePage(array $data) : void {
        extract($data); 
        ob_start(); 
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }


     /**
    * Admin Login (page) function
    * 
    */
    public function login() : void {

        //echo password_hash("Nicolai-111", PASSWORD_DEFAULT);
        //echo password_hash("hans22-Schmidt", PASSWORD_DEFAULT);
        //echo password_hash("AgentSecret-333", PASSWORD_DEFAULT);

        $data_page = [
            "page_description" => "Page de connexion en tant qu'administrateur du site du KGB pour créer, modifier ou supprimer des missions",
            "page_title" => "Connexion en tant qu'administrateur du site du KGB",
            "page_css" => "login.css",
            "view" => "views/loginView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Admin Login (validation) function 
    * 
    */
    public function loginValidation(): void {

        $uppercase = preg_match('/[A-Z]/', $_POST['password_admin']);
        $lowercase = preg_match('/[a-z]/', $_POST['password_admin']);
        $specialCharacter = preg_match('/[^\w]/', $_POST['password_admin']);
        $number = preg_match('/[0-9]/', $_POST['password_admin']);

        if($_POST){
            $email_admin = SecurityClass::secureHtml($_POST['email_admin']); 
            $password_admin = SecurityClass::secureHtml($_POST['password_admin']); 

            // Check if the email format is available & the length < 60 characters
            if(!filter_var($email_admin, FILTER_VALIDATE_EMAIL) && strlen($_POST['email_admin']) <= 60) {
                MessagesClass::addAlertMsg("Email mal renseigné.", MessagesClass::RED_COLOR);
                header("location:".URL."login"); 
                exit(); 
            // Check if the password format is avalaible by regex & the length min > 8 characters
            } elseif(['SERVER_NAME'] === 'localhost' && !$uppercase || !$lowercase || !$specialCharacter || !$number || !strlen($_POST['password_admin'] < 8)) {
                MessagesClass::addAlertMsg("Le mot de passe doit contenir au moins une majuscule, un minuscule, un chiffre et un caractère spécial.", MessagesClass::RED_COLOR);
                header("location:".URL."login"); 
                exit(); 
            } else { 
                if($this->adminManager->isCombinationValid($email_admin, $password_admin)) {
                    $this->adminManager->loginDb($email_admin); 
                } else {
                    MessagesClass::addAlertMsg("Impossible de vous identifier.", MessagesClass::RED_COLOR);
                    header("location:".URL."login"); 
                    exit(); 
                }
            }
        } else {
            MessagesClass::addAlertMsg("Email ou mot de passe non renseigné.", MessagesClass::RED_COLOR);
            header("location:".URL."login"); 
            exit();
        }
    }


    /**
    * Admin logout function
    * 
    */
    public function logout(): void {
        session_start(); 
        session_unset();
        session_destroy(); 
        MessagesClass::addAlertMsg("Déconnexion réussie.", MessagesClass::GREEN_COLOR); 
        header("location:".URL."home"); 
        exit();
    }


    /**
    * Error page function 
    *
    */
    public function errorPage($msg) : void {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "views/errorPageView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

}