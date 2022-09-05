<?php
require_once("models/AgentManager.php"); 
require_once("models/SpecialityManager.php"); 


class AgentController {

    private AgentManager $agentManager;
    private SpecialityManager $specialityManager; 


    public function __construct() {
        $this->agentManager = new AgentManager(); 
        $this->specialityManager = new SpecialityManager(); 
    }


    /**
    * Generate a page
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
    * Collect all the agent data 
    * Send all the agent data to the agentsView
    * 
    */
    public function agentsList() : void {

        $agents = $this->agentManager->getAll();

        $data_page = [
            "page_description" => "Page listant les agents",
            "page_title" => "Liste des agents",
            "agents" => $agents,
            "view" => "views/agentsView.php",
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
            "specialities" => $specialities,
            "view" => "views/createAgentView.php",
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
       header('location:'.URL."createMission");
       exit();
    }


    /**
    * Update a agent (page)
    *
    */
    public function updateAgent(){

        $agent = $this->getAgentById(); 

        $data_page = [
            "page_description" => "Page de modification d'un agent d'une mission",
            "page_title" => "Modification d'un agent d'une mission",
            "agent" => $agent,
            "view" => "views/updateAgentView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * Update a agent (validation)
    *
    */
    public function updateAgentValidation(): void {
        if($_POST) {
            $agent = new Agent($_POST);
            $this->agentManager->updateAgentDb($agent); 
        }
        // var_dump($agent); 
        header('location:'.URL."createMission");
    }


    /**
    * Delete a agent
    */
    public function deleteAgent(): void {
        $agent = $this->getAgentById();
        $this->agentManager->deleteAgentDb($agent->getId_agent());
        unset($agent); 
        header('location:'.URL."createMission");
    }



}

