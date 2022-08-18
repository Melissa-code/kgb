<?php
require_once("models/HideoutManager.php"); 


class HideoutController {

    private HideoutManager $hideoutManager;


    public function __construct() {
        $this->hideoutManager = new HideoutManager(); 
    }


    /**
    * Generate a page
    */
    private function generatePage(array $data) : void {
        extract($data); 
        ob_start(); 
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }


    /**
    * Get a hideout by id
    * @return id_hideout
    */
    // public function getHideoutById() : Hideout {

    //     return $hideout; 
    // }


    /**
    * Create a hideout
    */
    public function createHideout() : void {

        $data_page = [
            "page_description" => "Page de création d'une planque",
            "page_title" => "Création d'un agent d'une planque",
            "view" => "views/createHideoutView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function createHideoutValidation(): void {
        if($_POST) {
            $newHideout = new Hideout($_POST);
            $this->hideoutManager->createHideoutDb($newHideout); 
        }
       header('location:'.URL."createMission");
       exit();
    }

    /**
    * Update a hideout
    */
    public function updateHideout(){

        // $hideout = $this->getHideoutById(); 
        // var_dump($hideout);

        // $data_page = [
        //     "page_description" => "Page de modification d'une cachette",
        //     "page_title" => "Modification d'une cachette",
        //     "hideout" => $hideout,
        //     "view" => "views/updateHideoutView.php",
        //     "template" => "views/common/template.php"
        // ];
        // $this->generatePage($data_page); 
    }

    public function updateHideoutValidation(): void {
        // if($_POST) {
        //     $hideout = new Hideout($_POST);
        //     $this->agentHideout->updateHideoutDb($hideout); 
        // }
        // var_dump($hideout); 
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a hideout
    */
    public function deleteHideout(): void {
        //$hideout = $this->getHideoutById();
        //$this->hideoutManager->deleteHideoutDb($hideout->getId_hideout());
        //unset($hideout); 
        //header('location:'.URL."createMission");
    }



}

