<?php
require_once("models/AgentManager.php"); 
require_once("models/SpecialityManager.php"); 
require_once("models/Speciality_agentManager.php"); 


class AgentController {

    private AgentManager $agentManager;
    private SpecialityManager $specialityManager; 
    private Speciality_agentManager $speciality_agentManager; 


    public function __construct() {
        $this->agentManager = new AgentManager(); 
        $this->specialityManager = new SpecialityManager(); 
        $this->speciality_agentManager = new Speciality_agentManager(); 
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
    * Get the agent by id 
    *
    * @return id_agent
    */
    public function getAgentById() : Agent {
        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        // $agent = $this->agentManager->get(base64_decode(urldecode($params['q'])));
        $agent = $this->agentManager->get($params['q']);
        $agent  = $this->agentManager->get($agent->getId_agent());
        return $agent ; 
    }


    /**
    * Get all the agents 
    * 
    */
    public function agentsList() : void {

        $agents = $this->agentManager->getAll();

        $data_page = [
            "page_description" => "Page listant les agents",
            "page_title" => "Liste des agents",
            "page_css" => "list.css",
            "page_javascript" => ["list.js"],
            "agents" => $agents,
            "view" => "views/read/agentsView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create an agent (page) 
    *
    */
    public function createAgent() : void {

        $specialities = $this->specialityManager->getAll();

        $data_page = [
            "page_description" => "Page de création d'un agent",
            "page_title" => "Création d'un agent",
            "page_css" => "form.css",
            "specialities" => $specialities,
            "view" => "views/create/createAgentView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create an agent (validation) 
    *
    */
    public function createAgentValidation(): void {

        if($_POST) {
            $newAgent = new Agent($_POST);
            $this->agentManager->createAgentDb($newAgent); 
        }
       header("location:".URL."agentsList");
       exit();
    }


    /**
    * Update an agent (page) 
    *
    */
    public function updateAgent(){

        $agent = $this->getAgentById(); 
        $specialities = $this->specialityManager->getAll();
        $specialities_agents = $this->speciality_agentManager->getAll(); 

        $data_page = [
            "page_description" => "Page de modification d'un agent",
            "page_title" => "Modification d'un agent",
            "page_css" => "form.css",
            "agent" => $agent,
            "specialities" => $specialities,
            "specialities_agents" => $specialities_agents,
            "view" => "views/update/updateAgentView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }
    

    /**
    * Update an agent (validation) 
    *
    */
    public function updateAgentValidation(): void {
      
        if($_POST) {
            $agent = new Agent($_POST);
            $this->agentManager->updateAgentDb($agent); 
        }
        header("location:".URL."agentsList");
        exit();
    }


    /**
    * Delete an agent 
    *
    */
    public function deleteAgent(): void {
        $agent = $this->getAgentById();
        $this->agentManager->deleteAgentDb($agent->getId_agent());
        unset($agent); 
        header("location:".URL."agentsList");
        exit();
    }

}

