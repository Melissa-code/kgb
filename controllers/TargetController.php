<?php
require_once("models/TargetManager.php"); 


class TargetController {

    private TargetManager $targetManager;


    public function __construct() {
        $this->targetManager = new TargetManager(); 
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
    * Get a target by code
    * @return code_target
    */
    // public function getTargetByCode() : Target {

    //     return $target; 
    // }


    /**
    * Create a target
    */
    public function createTarget() : void {

        $data_page = [
            "page_description" => "Page de création d'une cible",
            "page_title" => "Création d'une cible",
            "view" => "views/createTargetView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function createTargetValidation(): void {
        if($_POST) {
            $newTarget = new Target($_POST);
            $this->targetManager->createTargetDb($newTarget); 
        }
       //var_dump($newTarget); 
       header('location:'.URL."createMission");
       exit();
    }

    /**
    * Update a target
    */
    public function updateTarget(){

        // $target = $this->getTargetByCode(); 
        // var_dump($target);

        // $data_page = [
        //     "page_description" => "Page de modification d'une cible",
        //     "page_title" => "Modification d'une cible",
        //     //"target" => $target,
        //     "view" => "views/updateTargetView.php",
        //     "template" => "views/common/template.php"
        // ];
        // $this->generatePage($data_page); 
    }

    public function updateTargetValidation(): void {
        // if($_POST) {
        //     $target = new Target($_POST);
        //     $this->contactTarget->updateTargetDb($target); 
        // }
        // var_dump($target); 
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a target
    */
    public function deleteTarget(): void {
        //$target = $this->getTargetByCode();
        //$this->contactTarget->deleteTargetDb($target->getCode_target());
        //unset($target); 
        //header('location:'.URL."createMission");
    }



}

