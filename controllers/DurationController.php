<?php
require_once("models/DurationManager.php"); 


class DurationController {

    private DurationManager $durationManager;


    public function __construct() {

        $this->durationManager = new DurationManager(); 
    }


    /**
    * Generate a page function 
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
    * Get a duration by id function 
    *
    * @return id_duration
    */
    public function getDurationById() : Duration {
        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        //$duration = $this->durationManager->get(base64_decode(urldecode($params['q'])));
        $duration = $this->durationManager->get($params['q']);
        $duration = $this->durationManager->get($duration->getId_duration());
        return $duration; 
    }


    /**
    * Get all the durations function 
    * 
    */
    public function durationsList() : void {

        $durations = $this->durationManager->getAll();

        $data_page = [
            "page_description" => "Page listant les durées",
            "page_title" => "Liste des durées",
            "durations" => $durations,
            "view" => "views/read/durationsView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a duration (page) function 
    *
    */
    public function createDuration() : void {

        $data_page = [
            "page_description" => "Page de création d'une durée",
            "page_title" => "Création d'une durée",
            "page_css" => "form.css",
            "view" => "views/create/createDurationView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a duration (validation) function 
    *
    */
    public function createDurationValidation(): void {
        if($_POST) {
            $newDuration = new Duration($_POST);
            $this->durationManager->createDurationDb($newDuration); 
        }
        header("location:".URL."durationsList");
        exit();
    }


    /**
    * Update a duration (page) function 
    *
    */
    public function updateDuration(){

        $duration = $this->getDurationById(); 

        $data_page = [
            "page_description" => "Page de modification de la durée d'une mission",
            "page_title" => "Modification d'une durée",
            "page_css" => "form.css",
            "duration" => $duration,
            "view" => "views/update/updateDurationView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Update a duration (validation) function 
    *
    */
    public function updateDurationValidation(): void {

        if($_POST) {
            $duration = new Duration($_POST);
            $this->durationManager->updatedurationDb($duration); 
        }
        header("location:".URL."durationsList");
        exit();
    }


    /**
    * Delete a duration function 
    */
    public function deleteDuration(): void {

        $duration = $this->getDurationById();
        $this->durationManager->deleteDurationDb($duration->getId_duration());
        unset($duration); 
        header("location:".URL."durationsList");
        exit();
    }

}

