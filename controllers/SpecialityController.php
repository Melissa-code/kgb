<?php

require_once("models/SpecialityManager.php"); 


class SpecialityController {

    private SpecialityManager $specialityManager;
  

    public function __construct() {
        $this->specialityManager = new SpecialityManager();
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
    * Get the speciality by name 
    *
    * @return name_speciality
    */
    public function getSpecialityByName() : Speciality {
        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        // $status = $this->statusManager->get(base64_decode(urldecode($params['q'])));
        $speciality = $this->specialityManager->get($params['q']);
        $speciality = $this->specialityManager->get($speciality ->getName_speciality());
        return $speciality; 
    }

    /**
    * Collect all the speciality data 
    * Send all the speciality data to the specialitiesView
    * 
    */
    public function specialitiesList() : void {

        $specialities = $this->specialityManager->getAll();

        $data_page = [
            "page_description" => "Page listant les spécialités des missions",
            "page_title" => "Liste des spécialités des missions",
            "specialities" => $specialities,
            "view" => "views/read/specialitiesView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a speciality function 
    *
    */
    public function createSpeciality() : void {

        $specialities = $this->specialityManager->getAll();

        $data_page = [
            "page_description" => "Page de création d'une spécialité d'une mission",
            "page_title" => "Création d'une spécialité d'une mission",
            "specialities" => $specialities, 
            "view" => "views/create/createSpecialityView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function createSpecialityValidation(): void {
        if($_POST) {
            $newSpeciality = new Speciality($_POST);
            $this->specialityManager->createSpecialityDb($newSpeciality); 
        }
        header('location:'.URL.'specialitiesList');
        exit();
    }


    /**
    * Update a speciality (page) function 
    *
    */
    public function updateSpeciality(){

        $speciality = $this->getSpecialityByName(); 

        $data_page = [
            "page_description" => "Page de modification d'une spécialité d'une mission",
            "page_title" => "Modification d'une spécialité d'une mission",
            "speciality" => $speciality,
            "view" => "views/update/updateSpecialityView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Update a speciality (validation) function 
    *
    */
    public function updateSpecialityValidation(): void {

        if($_POST) {
            $speciality = new Speciality($_POST);
            $this->specialityManager->updateSpecialityDb($speciality); 
        }
        header('location:'.URL.'specialitiesList');
        exit();
    }


    /**
    * Delete a speciality function 
    *
    */
    public function deleteSpeciality(): void {
        $speciality = $this->getSpecialityByName();
        $this->specialityManager->deletespecialityDb($speciality->getName_speciality());
        unset($speciality); 
        header('location:'.URL.'specialitiesList');
        exit(); 
    }

}

