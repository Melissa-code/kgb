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
    * Login Admin (page) function
    * 
    */
    public function login() : void {

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
    * Login Admin (validation) function 
    * 
    */
    public function loginValidation(): void {
        session_start(); 

        if($_POST){
            $email_admin = htmlspecialchars($_POST['email_admin']); 
            $password_admin = htmlspecialchars($_POST['password_admin']); 

            if(!filter_var($email_admin, FILTER_VALIDATE_EMAIL)) {
                header("location:".URL."login"); 
                exit(); 
            } else {
                $this->adminManager->loginDb($email_admin, $password_admin); 
            }
        } else {
            header("location:".URL."login"); 
            exit();
        }
    }


    /**
    * Logout Admin function
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