<?php
require_once("models/AgentManager.php"); 


class AgentController {

    private AgentManager $agentManager;


    public function __construct() {
        $this->agentManager = new AgentManager(); 
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
    * Get a agent by id
    * @return id_agent
    */
    // public function getStatusByCode() : Status {

    //     return $agent; 
    // }


    /**
    * Create a agent
    */
    public function createAgent() : void {

        $data_page = [
            "page_description" => "Page de création d'un agent d'une mission",
            "page_title" => "Création d'un agent d'une mission",
            "view" => "views/createAgentView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function createAgentValidation(): void {
        if($_POST) {
            $newAgent = new Agent($_POST);
            $this->agentManager->createAgentDb($newAgent); 
        }
       header('location:'.URL."createMission");
       exit();
    }

    /**
    * Update a agent
    */
    public function updateAgent(){

        // $agent = $this->getAgentById(); 
        // var_dump($agent);

        // $data_page = [
        //     "page_description" => "Page de modification d'un agent d'une mission",
        //     "page_title" => "Modification d'un agent d'une mission",
        //     //"agent" => $agent,
        //     "view" => "views/updateAgentView.php",
        //     "template" => "views/common/template.php"
        // ];
        // $this->generatePage($data_page); 
    }

    public function updateAgentValidation(): void {
        // if($_POST) {
        //     $agent = new Agent($_POST);
        //     $this->agentManager->updateAgentDb($agent); 
        // }
        // var_dump($agent); 
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a agent
    */
    public function deleteAgent(): void {
        //$agent = $this->getAgentById();
        //$this->agentManager->deleteAgentDb($status->getCode_status());
        //unset($agent); 
        //header('location:'.URL."createMission");
    }



}

