<?php

require_once("models/SpecialityManager.php"); 
require_once("models/AgentManager.php"); 
require_once("models/MissionManager.php"); 


class SpecialityController {

    private SpecialityManager $specialityManager;
    private AgentManager $agentManager;
    private MissionManager $missionManager;


    public function __construct() {
        $this->specialityManager = new SpecialityManager(); 
        $this->agentManager= new AgentManager (); 
        $this->missionManager = new MissionManager(); 
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
    * Get a speciality by name
    * @return name_speciality
    */
    // public function getSpecialityByName() : Speciality {

    //     return $speciality; 
    // }


    /**
    * Create a speciality
    */
    public function createSpeciality() : void {

        $specialities = $this->specialityManager->getAll();
        $agents = $this->agentManager->getAll();
        $missions = $this->missionManager->getAll();

        $data_page = [
            "page_description" => "Page de création d'une spécialité d'une mission",
            "page_title" => "Création d'une spécialité d'une mission",
            "specialities" => $specialities, 
            "agents" => $agents, 
            "missions" => $missions, 
            "view" => "views/createSpecialityView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function createSpecialityValidation(): void {
        if($_POST) {
            $newSpeciality = new Speciality($_POST);
            $this->specialityManager->createSpecialityDb($newSpeciality); 
        }
        header('location:'.URL."createMission");
        exit();
    }

    /**
    * Update a speciality
    */
    public function updateSpeciality(){

        // $speciality = $this->getSpecialityByName(); 
        // var_dump($speciality);

        $data_page = [
            "page_description" => "Page de modification d'une spécialité d'une mission",
            "page_title" => "Modification d'une spécialité d'une mission",
            //"speciality" => $speciality,
            "view" => "views/updateSpecialityView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function updateSpecialityValidation(): void {
        // if($_POST) {
        //     $speciality = new Speciality($_POST);
        //     $this->specialityManager->updateSpecialityDb($speciality); 
        // }
        // var_dump($speciality); 
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a speciality
    */
    public function deleteSpeciality(): void {
        //$speciality = $this->getSpecialityByName();
        //$speciality = $this->specialityManager->get("");
        //$this->specialityManager->deletespecialityDb($status->getCode_status());
        //$this->specialityManager->deletespecialityDb("test");
        //unset($speciality); 
        //header('location:'.URL."createMission");
    }



}

