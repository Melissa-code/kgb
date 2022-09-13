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
    * Get the target by code 
    *
    * @return code_target
    */
    public function getTargetByCode() : Target {
        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        // $target = $this->targetManager->get(base64_decode(urldecode($params['q'])));
        $target = $this->targetManager->get($params['q']);
        $target = $this->targetManager->get($target->getCode_target());
        return $target ;
    }

    /**
    * Get all the targets (array)
    * Send them to the targetsView
    * 
    */
    public function targetsList() : void {

        $targets  = $this->targetManager->getAll();

        $data_page = [
            "page_description" => "Page listant les cibles",
            "page_title" => "Liste des cibles",
            "targets" => $targets,
            "view" => "views/read/targetsView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a target (page)
    *
    */
    public function createTarget() : void {

        $data_page = [
            "page_description" => "Page de création d'une cible",
            "page_title" => "Création d'une cible",
            "view" => "views/create/createTargetView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a target (validation)
    *
    */
    public function createTargetValidation(): void {
        if($_POST) {
            $newTarget = new Target($_POST);
            $this->targetManager->createTargetDb($newTarget); 
        }
       header('location:'.URL."createMission");
       exit();
    }


    /**
    * Update a target (page)
    *
    */
    public function updateTarget(){

        $target = $this->getTargetByCode(); 

        $data_page = [
            "page_description" => "Page de modification d'une cible",
            "page_title" => "Modification d'une cible",
            "target" => $target,
            "view" => "views/update/updateTargetView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function updateTargetValidation(): void {
        if($_POST) {
            $target = new Target($_POST);
            $this->targetManager->updateTargetDb($target); 
        }
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a target
    *
    */
    public function deleteTarget(): void {
        $target = $this->getTargetByCode();
        $this->targetManager->deleteTargetDb($target->getCode_target());
        unset($target); 
        header('location:'.URL."createMission");
    }



}

