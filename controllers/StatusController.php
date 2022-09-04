<?php
require_once("models/StatusManager.php"); 
require_once("models/MissionManager.php"); 


class StatusController {

    private StatusManager $statusManager;


    public function __construct() {

        $this->statusManager = new StatusManager(); 
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
    * Get the status by code 
    * @return code_status
    */
    public function getStatusByCode() : Status {
        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        // $status = $this->statusManager->get(base64_decode(urldecode($params['q'])));
        $status = $this->statusManager->get($params['q']);
        $status = $this->statusManager->get($status->getCode_status());
        return $status; 
    }

     /**
    * Collect all the status data 
    * Send all the missions data to the missionsView
    * 
    */
    public function statusList() : void {

        $status = $this->statusManager->getAll();

        $data_page = [
            "page_description" => "Page listant les statuts",
            "page_title" => "Statuts",
            "status" => $status,
            "view" => "views/statusView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a status
    */
    public function createStatus() : void {

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
        header('location:'.URL."createMission");
        exit();
    }

    /**
    * Update a status
    */
    public function updateStatus(){

        $status = $this->getStatusByCode();
        // var_dump($status);

        $data_page = [
            "page_description" => "Page de modification du statut",
            "page_title" => "Modification du statut",
            "status" => $status,
            "view" => "views/updateStatusView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function updateStatusValidation(): void {

        // $codeStatus = $this->statusManager->get($_POST['code_status']);
        //var_dump($codeStatus); 
        

        if($_POST) {
            $status = new Status($_POST);
            //var_dump($_POST);
            $this->statusManager->updateStatusDb($status); 
            header('location:'.URL."createMission");
        }
       
        //     $status->hydrate($_POST);
        //     print_r($status);
        //     $this->statusManager->updateStatusDb($status); 
        // }
        //$this->statusManager->updateStatusDb($codeStatus); 
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a status
    */
    public function deleteStatus(): void {
        $status = $this->getStatusByCode();
        $this->statusManager->deleteStatusDb($status->getCode_status());
        unset($status); 
        header('location:'.URL."createMission");
    }



}

