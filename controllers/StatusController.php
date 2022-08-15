<?php
require_once("models/StatusManager.php"); 


class StatusController {

    private StatusManager $statusManager;


    public function __construct() {

        $this->statusManager = new StatusManager(); 
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
    * Get a status by code 
    * @return code_status
    */
    // public function getStatusByCode() : Status {

    //     return $status; 
    // }


    /**
    * Create a status
    */
    public function createStatus() : void {
        $status = $this->statusManager->getAll();

        $data_page = [
            "page_description" => "Page de création du statut d'une mission",
            "page_title" => "Création du statut d'une mission",
            "view" => "views/createStatusView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function createStatusValidation(): void {
        if($_POST) {
            $newStatus = new Status($_POST);
            $this->statusManager->createStatusDb($newStatus); 
        }
        // var_dump($newStatus); 
        header('location:'.URL."createMission");
    }

    /**
    * Update a status
    */
    public function updateStatus(){

        // $status = $this->getStatusByCode(); 
        // var_dump($status);

        $data_page = [
            "page_description" => "Page de modification du statut d'une mission",
            "page_title" => "Modification du statut d'une mission",
            //"statut" => $status,
            "view" => "views/updateStatusView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function updateStatusValidation(): void {
        if($_POST) {
            $status = new Status($_POST);
            $this->statusManager->updateStatusDb($status); 
        }
        // var_dump($status); 
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a status
    */
    public function deleteStatus(): void {
        //$status = $this->getStatusByCode();
        //$status = $this->statusManager->get("test");
    
        //$this->statusManager->deletestatusDb($status->getCode_status());
        //$this->statusManager->deletestatusDb("test");
        //unset($status); 
        //header('location:'.URL."createMission");
    }



}

