<?php
require_once("models/MissionManager.php"); 
require_once("models/AdminManager.php"); 
require_once("models/TypeManager.php"); 
require_once("models/DurationManager.php"); 
require_once("models/AgentManager.php"); 
require_once("models/ContactManager.php"); 
require_once("models/TargetManager.php"); 
require_once("models/HideoutManager.php"); 
require_once("models/Hideout_missionManager.php"); 
require_once("models/SpecialityManager.php"); 
require_once("models/StatusManager.php"); 
require_once("models/Agent_missionManager.php"); 
require_once("models/Contact_missionManager.php"); 
require_once("models/Target_missionManager.php"); 
require_once("models/Speciality_agentManager.php"); 



class MainController {

    private MissionManager $missionManager;
    private AdminManager $adminManager; 
    private AgentManager $agentManager; 
    private TypeManager $typeManager; 
    private DurationManager $durationManager; 
    private ContactManager $contactManager; 
    private TargetManager $targetManager; 
    private HideoutManager $hideoutManager; 
    private Hideout_missionManager $hideout_missionManager; 
    private SpecialityManager $specialityManager; 
    private StatusManager $statusManager; 
    private Agent_missionManager $agent_missionManager; 
    private Contact_missionManager $contact_missionManager; 
    private Target_missionManager $target_missionManager; 
    private Speciality_agentManager $speciality_agentManager; 
    

    public function __construct() {
        $this->missionManager = new MissionManager(); 
        $this->adminManager = new AdminManager(); 
        $this->typeManager = new TypeManager(); 
        $this->durationManager = new DurationManager(); 
        $this->agentManager = new AgentManager(); 
        $this->contactManager = new ContactManager(); 
        $this->targetManager = new TargetManager(); 
        $this->hideoutManager = new HideoutManager(); 
        $this->hideout_missionManager = new Hideout_missionManager(); 
        $this->specialityManager = new SpecialityManager(); 
        $this->statusManager = new StatusManager();
        $this->agent_missionManager = new Agent_missionManager();
        $this->contact_missionManager = new Contact_missionManager();
        $this->target_missionManager = new Target_missionManager();
        $this->speciality_agentManager = new Speciality_agentManager();
    }


    /**
    * Get the mission by code 
    * @return code_mission 
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
    * Generate a page
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
            "page_title" => "Page d'accuel du site du KGB",
            // "page_css" => "home.css",
            "page_javascript" => ["home.js"],
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
        $agents_missions = $this->agent_missionManager->getAll();
        $contacts_missions = $this->contact_missionManager->getAll();
        $targets_missions = $this->target_missionManager->getAll();
        $agents = $this->agentManager->getAll();
        $contacts = $this->contactManager->getAll();
        $targets = $this->targetManager->getAll();
        $durations = $this->durationManager->getAll();
        $specialities = $this->specialityManager->getAll(); 
        $specialities_agents = $this->speciality_agentManager->getAll();
        $hideouts = $this->hideoutManager->getAll(); 
        $hideouts_missions = $this->hideout_missionManager->getAll(); 


        $data_page = [
            "page_description" => "Page affichant le détail d'une mission secrète",
            "page_title" => "Détail d'une mission",
            "mission" => $mission,
            "agents_missions" => $agents_missions,
            "contacts_missions" => $contacts_missions,
            "targets_missions" => $targets_missions,
            "agents" => $agents, 
            "contacts" => $contacts, 
            "targets" => $targets, 
            "hideouts" => $hideouts,
            "hideouts_missions" => $hideouts_missions,
            "specialities" => $specialities,
            "specialities_agents" => $specialities_agents,
            "durations" => $durations,
            "view" => "views/oneMissionView.php",
            "template" => "views/common/template.php"
        ];
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
            // "page_css" => "login.css",
            "view" => "views/loginView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
     
    }

    /**
    * Collect the login data from loginView
    * Connect the Admin 
    * 
    */
    public function loginValidation(): void {
        session_start(); 

        if($_POST){
            $email_admin = htmlspecialchars($_POST['email_admin']); 
            $password_admin = htmlspecialchars($_POST['password_admin']); 

            if(!filter_var($email_admin, FILTER_VALIDATE_EMAIL)) {
                header('location:'.URL."login"); 
                exit(); 
            } else {
                $this->adminManager->loginDb($email_admin, $password_admin); 
            }
            
        } else {
            header('location:'.URL."login"); 
        }
    }

    /**
    * Logout the Admin 
    * 
    */
    public function logout(): void {

        session_start(); 
        session_unset();
        session_destroy(); 
        echo  "admin déconnecté";
        //setcookie('auth', '', time() -1, '/', null, false, true); 
        header('location:'.URL."home"); 
    }


    /**
    * display the createMissionView 
    * 
    */
    public function createMission(): void {

        $agents = $this->agentManager->getAll();
        $contacts = $this->contactManager->getAll();
        $status = $this->statusManager->getAll();
        $types = $this->typeManager->getAll();
        $durations = $this->durationManager->getAll();
        $targets = $this->targetManager->getAll();
        $hideouts = $this->hideoutManager->getAll();
        $specialities = $this->specialityManager->getAll();
        $specialities_agents = $this->speciality_agentManager->getAll();

        //echo "<pre>";var_dump($specialities_agents); echo" </pre>";

        $data_page = [
            "page_description" => "Page de création d'une mission",
            "page_title" => "Création d'un mission",
            "view" => "views/createMissionView.php",
            "agents" => $agents,
            "contacts" => $contacts,
            "targets" => $targets,
            "status" => $status,
            "types" => $types,
            "hideouts" => $hideouts,
            "specialities" => $specialities,
            "specialities_agents" => $specialities_agents,
            "durations" => $durations,
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

        session_start();

        if($_POST){

            $newMission = new Mission($_POST);

            $checkNationalityTarget = $this->missionManager->checkNationalityTargetDb($newMission); 
            $checkNationalityContact = $this->missionManager->checkNationalityContactDb($newMission); 
            $checkCountryHideout = $this->missionManager->checkCountryHideoutDb($newMission); 
            
            if($checkNationalityTarget) {
                $_SESSION['alert1'] = [
                    "type" => "error",
                    "msg" => "Erreur: les cibles ne doivent pas avoir la même nationalité que les agents."
                ];
                header('location:'.URL."createMission");
                exit();
                
            } elseif($checkNationalityContact) {
                $_SESSION['alert2'] = [
                    "type" => "error",
                    "msg" => "Erreur: les contacts doivent être de la nationalité du pays de la mission."
                ];
                header('location:'.URL."createMission");
                exit();

            } elseif($checkCountryHideout) {
                $_SESSION['alert3'] = [
                    "type" => "error",
                    "msg" => "Erreur: les planques doivent être dans le même pays que la mission."
                ];
                header('location:'.URL."createMission");
                exit();
    
                // $this->missionManager->createMissionDb($newMission); 
                // header('location:'.URL."missions");
                // exit();
                
            }
        }
    }

    /**
    * display the updateMissionView with the mission data
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
        unset($mission); 
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