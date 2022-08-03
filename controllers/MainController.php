<?php

require_once("./models/MissionManager.php"); 

class MainController {

    private $missionManager;

    public function __construct() {
        $this->missionManager = new MissionManager(); 
    }

    private function generatePage(array $data) {
        extract($data); //function to create variables from the array $data_page (indice of the array becomes variable)
        ob_start(); 
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    public function home() {
        $data_page = [
            "page_description" => "Page d'accuel du site du KGB",
            "page_title" => "Page d'accuel du site du KGB",
            "view" => "./views/homeView.php",
            "template" => "./views/common/template.php"
        ];
        $this->generatePage($data_page); 
        // $page_description = "Page d'accuel du site du KGB."; 
        // $page_title = "Présentation du site du KGB"; 
        // ob_start(); 
        // require_once('./views/homeView.php');
        // $page_content = ob_get_clean();
        // require_once('./views/common/template.php');
    }

    public function missions() {

        $missions = $this->missionManager->getAll();

        $data_page = [
            "page_description" => "Page listant l'ensemble des missions secrètes du KGB",
            "page_title" => "Missions du KGB",
            "missions" => $missions,
            "view" => "./views/missionsView.php",
            "template" => "./views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function login() {
        $data_page = [
            "page_description" => "Page de connexion en tant qu'administrateur du site du KGB pour créer, modifier ou supprimer des missions",
            "page_title" => "Connexion en tant qu'administrateur du site du KGB",
            "view" => "./views/loginView.php",
            "template" => "./views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }
  
    public function errorPage($msg) {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "./views/errorPageView.php",
            "template" => "./views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }












}