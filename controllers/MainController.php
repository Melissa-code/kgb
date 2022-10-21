<?php
require_once("controllers/MessagesClass.php"); 
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
    * Get the mission by code function
    *
    * @return Mission $mission
    */
    public function getMissionByCode() : Mission  {

        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        $mission = $this->missionManager->get(base64_decode(urldecode($params['q'])));
        //$mission = $this->missionManager->get($params['q']);
        $mission = $this->missionManager->get($mission->getCode_mission());
        return $mission; 
    }

    /**
    * Generate a page function
    */
    private function generatePage(array $data) : void {

        extract($data); //function to create variables from the array $data_page (indice of the array becomes variable)
        ob_start(); 
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    /**
    * Home page function
    * 
    */
    public function home() : void {

        $data_page = [
            "page_description" => "Page d'accuel du site",
            "page_title" => "Page d'accuel du site",
            "page_css" => "home.css",
            "view" => "views/homeView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * Display all the missions function
    *
    */
    public function missions() : void {

        $url2 = getenv('PROD');

        $missions = $this->missionManager->getAll();
        $admins = $this->adminManager->getAll();

        $data_page = [
            "page_description" => "Page listant l'ensemble des missions secrètes de la société Spy",
            "page_title" => "Missions de la société Spy",
            "url2" => $url2,
            "missions" => $missions,
            "admins" => $admins,
            "page_css" => "list.css",
            "pagejavascript" => ["missionslist.js"],
            "view" => "views/read/missionsView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * Display one mission function
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
            "page_css" => "list.css",
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
            "view" => "views/read/oneMissionView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a mission (page) function
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

        $data_page = [
            "page_description" => "Page de création d'une mission",
            "page_title" => "Création d'une mission",
            "page_css" => "form.css",
            "view" => "views/create/createMissionView.php",
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
    * Create a mission (validation) function
    * 
    */
    public function createMissionValidation(): void {

        if($_POST){
            $newMission = new Mission($_POST);

            // Check the rule :  One agent must have the same speciality as the mission 
            $id_agents = $newMission->getId_agent();
            $speciality = $newMission->getName_speciality();
            $one_agent = false;
            $specialities_agents = $this->speciality_agentManager->getAll();

            foreach ($id_agents as $id_agent) {
                foreach ($specialities_agents as $speciality_agent) {
                    $speciality_name = $speciality_agent->getName_speciality();
                    $speciality_agentId = $speciality_agent->getId_agent();

                    if($speciality == $speciality_name && $speciality_agentId == $id_agent){
                        $one_agent = true;
                        break;
                    }
                }
            }

            // Check the rule: The targets haven't to have the same nationality as the agents
            $checkNationalityTarget = $this->missionManager->checkNationalityTargetDb($newMission); 

            // Check the rule : The Contacts must have the same nationality as the mission
            $checkNationalityContact = $this->missionManager->checkNationalityContactDb($newMission); 
            
            // Check the rule : The Hideouts must be in the same country as the mission
            $checkCountryHideout = $this->missionManager->checkCountryHideoutDb($newMission); 

            // Display an alert message if one of the rules is wrong 
            if($one_agent === false) {
                MessagesClass::addAlertMsg("ERREUR: Au moins un agent doit avoir la même spécialité que la mission.", MessagesClass::RED_COLOR); 
                header("location:".URL."createMission");
                exit();
            }
            elseif($checkNationalityTarget) {
                MessagesClass::addAlertMsg("ERREUR : les cibles ne doivent pas avoir la même nationalité que les agents.", MessagesClass::RED_COLOR); 
                header("location:".URL."createMission");
                exit();
            } elseif($checkNationalityContact) {
                MessagesClass::addAlertMsg("ERREUR : les contacts doivent être de la nationalité du pays de la mission.", MessagesClass::RED_COLOR); 
                header("location:".URL."createMission");
                exit();
            } elseif($checkCountryHideout) {
                MessagesClass::addAlertMsg("ERREUR: les planques doivent être dans le même pays que la mission.", MessagesClass::RED_COLOR); 
                header("location:".URL."createMission");
                exit();
            } else {    
                // Create the new mission 
                $this->missionManager->createMissionDb($newMission); 
                header('location:'.URL."missions");
                exit();
            }
        }
    }
    
    /**
    * Update a mission (page) function
    * 
    */
    public function updateMission():void {

        $mission = $this->getMissionByCode(); 
        $agents = $this->agentManager->getAll();
        $specialities_agents = $this->speciality_agentManager->getAll();
        $agents_missions = $this->agent_missionManager->getAll();
        $contacts = $this->contactManager->getAll();
        $contacts_missions = $this->contact_missionManager->getAll();
        $targets = $this->targetManager->getAll();
        $targets_missions = $this->target_missionManager->getAll();
        $durations = $this->durationManager->getAll();
        $status = $this->statusManager->getAll(); 
        $types = $this->typeManager->getAll();
        $specialities = $this->specialityManager->getAll();
        $hideouts = $this->hideoutManager->getAll();
        $hideouts_missions = $this->hideout_missionManager->getAll();

        $data_page = [
            "page_description" => "Page de modification d'une mission",
            "page_title" => "Modification d'un mission",
            "page_css" => "form.css",
            "agents" => $agents,
            "agents_missions" => $agents_missions,
            "specialities_agents" => $specialities_agents,
            "contacts" => $contacts,
            "contacts_missions" => $contacts_missions,
            "targets" => $targets,
            "targets_missions" => $targets_missions,
            "durations" => $durations,
            "status" => $status,
            "types" => $types,
            "specialities" => $specialities,
            "hideouts" => $hideouts,
            "hideouts_missions" => $hideouts_missions,
            "mission" => $mission,
            "view" => "views/update/updateMissionView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * Update a mission (validation) function
    *
    */
    public function updateMissionValidation(): void {

        if($_POST) {
            $mission = new Mission($_POST);
            $this->missionManager->updateMissionDb($mission); 
        }
        header("location:".URL."missions");
        exit();
    }

    /**
    * Delete a mission function
    *   
    */
    public function deleteMission(): void {

        $mission = $this->getMissionByCode();

        $this->missionManager->deleteMissionDb($mission->getCode_mission());
        unset($mission); 
        header("location:".URL."missions");
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