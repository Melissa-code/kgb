<?php
require_once("models/DurationManager.php"); 


class DurationController {

    private DurationManager $durationManager;


    public function __construct() {

        $this->durationManager = new DurationManager(); 
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
    * Get a duration by id 
    * @return id_duration
    */
    // public function getDurationById() : Duration {

    //     return $duration; 
    // }


    /**
    * Create a duration
    */
    public function createDuration() : void {

        $data_page = [
            "page_description" => "Page de création d'une durée",
            "page_title" => "Création d'une durée",
            "view" => "views/createDurationView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function createDurationValidation(): void {
        if($_POST) {
            $newDuration = new Duration($_POST);
            $this->durationManager->createDurationDb($newDuration); 
        }
        //var_dump($newDuration); 
        header('location:'.URL."createMission");
        exit();
    }

    /**
    * Update a duration
    */
    public function updateDuration(){

        // $duration = $this->getDurationById(); 
        // var_dump($duration);

        // $data_page = [
        //     "page_description" => "Page de modification du statut d'une mission",
        //     "page_title" => "Modification du statut d'une mission",
        //     //"duration" => $duration,
        //     "view" => "views/updateDurationView.php",
        //     "template" => "views/common/template.php"
        // ];
        // $this->generatePage($data_page); 
    }

    public function updateDurationValidation(): void {
        // if($_POST) {
        //     $duration = new Duration($_POST);
        //     $this->durationManager->updatedurationDb($duration); 
        // }
        // var_dump($duration); 
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a duration
    */
    public function deleteDuration(): void {
        //$duration = $this->getDurationById();
        //$duration = $this->durationManager->get("");
    
        //$this->durationManager->deleteDurationDb($duration->getId_duration());
        //$this->durationManager->deletedurationDb("test");
        //unset($duration); 
        //header('location:'.URL."createMission");
    }



}

