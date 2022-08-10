<?php
require_once("models/MissionManager.php"); 


class MainController {

    private MissionManager $missionManager;


    public function __construct() {

        $this->missionManager = new MissionManager(); 
    }

    /**
    * Collect the mission by code 
    * 
    * Return the mission by code
    */
    public function getMissionByCode() : Mission  {

        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        //print_r($params['q']); 
        $mission = $this->missionManager->get(base64_decode(urldecode($params['q'])));
        //$mission = $this->missionManager->get($params['q']);
        $mission = $this->missionManager->get($mission->getCode_mission());
        //var_dump($mission);
        return $mission; 
    }

    /**
    * Collect the data views 
    * 
    * 
    */
    private function generatePage(array $data) : void {

        extract($data); //function to create variables from the array $data_page (indice of the array becomes variable)
        ob_start(); 
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    /**
    * Collect the data views 
    * Send the data views to the homeView
    * 
    */
    public function home() : void {

        $data_page = [
            "page_description" => "Page d'accuel du site du KGB",
            "page_css" => "home.css",
            "page_title" => "Page d'accuel du site du KGB",
            "view" => "views/homeView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * Collect all the missions data 
    * Send all the missions data to the missionsView
    * 
    */
    public function missions() : void {

        $missions = $this->missionManager->getAll();

        $data_page = [
            "page_description" => "Page listant l'ensemble des missions secrètes du KGB",
            "page_title" => "Missions du KGB",
            "missions" => $missions,
            "view" => "views/missionsView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * Collect one mission data 
    * Send all the mission data to the oneMissionView
    * 
    */
    public function oneMission(): void {

        $mission = $this->getMissionByCode(); 

        $data_page = [
            "page_description" => "Page affichant le détail d'une mission secrète",
            "page_title" => "Détail d'une mission",
            "mission" => $mission,
            "view" => "views/oneMissionView.php",
            "template" => "views/common/template.php"
        ];
        
        // var_dump($data_page);
        $this->generatePage($data_page); 
    }

    /**
    * Collect the login data 
    * Send all the login data to the loginView
    * 
    */
    public function login() : void {
        $data_page = [
            "page_description" => "Page de connexion en tant qu'administrateur du site du KGB pour créer, modifier ou supprimer des missions",
            "page_title" => "Connexion en tant qu'administrateur du site du KGB",
            "view" => "views/loginView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * display the createMissionView 
    * 
    * 
    */
    public function createMission(): void {
        $data_page = [
            "page_description" => "Page de création d'une mission",
            "page_title" => "Création d'un mission",
            "view" => "views/createMissionView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * Collect the form data from the createMissionView
    * Send the form data to the MissionManager 
    * Redirecting user to the missionsView and display the new mission 
    */
    public function createMissionValidation(): void {
        if($_POST) {
            $newMission = new Mission($_POST);
            $this->missionManager->createMissionDb($newMission); 
        }
        //var_dump($newMission); 
        header('location:'.URL."missions");
    }

    /**
    * display the updateMissionView with the mission data
    * 
    * 
    */
    public function updateMission(): void {
        $mission = $this->getMissionByCode(); 
        // var_dump($mission);

        $data_page = [
            "page_description" => "Page de modification d'une mission",
            "page_title" => "Modification d'un mission",
            "mission" => $mission,
            "view" => "views/updateMissionView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * Collect the form data from the updateMissionView
    * Send the form data to the MissionManager 
    * Redirecting user to the missionsView and display the updating mission 
    */
    public function updateMissionValidation(): void {
        if($_POST) {
            $mission = new Mission($_POST);
            $this->missionManager->updateMissionDb($mission); 
        }
        // var_dump($mission); 
        header('location:'.URL."missions");
    }

    /**
    * Collect the mission data 
    * Delete the data  
    * 
    */
    public function deleteMission(): void {
        $mission = $this->getMissionByCode();
    
        $this->missionManager->deleteMissionDb($mission->getCode_mission());
        header('location:'.URL."missions");
    }

    /**
    * Collect the data views 
    * Send the data views to the errorView
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