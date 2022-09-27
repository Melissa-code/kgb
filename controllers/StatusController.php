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
        extract($data); 
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
    * Get all the status function 
    * 
    * 
    */
    public function statusList() : void {

        $status = $this->statusManager->getAll();

        $data_page = [
            "page_description" => "Page listant les statuts",
            "page_title" => "Statuts",
            "status" => $status,
            "view" => "views/read/statusView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a status (page) function 
    *
    */
    public function createStatus() : void {

        $data_page = [
            "page_description" => "Page de création du statut d'une mission",
            "page_title" => "Création du statut d'une mission",
            "view" => "views/create/createStatusView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }
    

    /**
    * Create a status (validation) function 
    *
    */
    public function createStatusValidation(): void {

        if($_POST) {
            $newStatus = new Status($_POST);
            $this->statusManager->createStatusDb($newStatus); 
        }
        header("location:".URL."statusList");
        exit();
    }


    /**
    * Update a status (page) function 
    *
    */
    public function updateStatus(){

        $status = $this->getStatusByCode();

        $data_page = [
            "page_description" => "Page de modification du statut",
            "page_title" => "Modification du statut",
            "status" => $status,
            "view" => "views/update/updateStatusView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /** 
     * Update a status (validation) function 
     * 
     */
    public function updateStatusValidation(): void {

        if($_POST) {
            $status = new Status($_POST);
            $this->statusManager->updateStatusDb($status); 
            header("location:".URL."statusList");
            exit(); 
        }
    }


    /**
    * Delete a status function 
    */
    public function deleteStatus(): void {

        $status = $this->getStatusByCode();
        $this->statusManager->deleteStatusDb($status->getCode_status());
        unset($status); 
        header("location:".URL."statusList");
        exit(); 
    }
}

