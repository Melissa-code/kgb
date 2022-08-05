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
            "page_css" => "home.css",
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

    public function oneMission() {

        $query = $_SERVER;
        // print_r($query['SERVER_NAME'].":");
        // print_r($query['SERVER_PORT']);
        // print_r($query['REQUEST_URI']); 
       $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
       //echo $url; 
       

        //echo URL;
        $l = parse_url($url);
        parse_str($l['query'], $params);
        // print_r($params['q']); 


        $mission = $this->missionManager->get($params['q']);
        //print_r($params['q']); 
        $mission = $this->missionManager->get($mission->getCode_mission());

        //var_dump($mission); 

        $data_page = [
            "page_description" => "Page affichant le détail d'une mission secrète",
            "page_title" => "Détail d'une mission",
            "mission" => $mission,
            "view" => "./views/oneMissionView.php",
            "template" => "./views/common/template.php"
        ];
        
        // var_dump($data_page);
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