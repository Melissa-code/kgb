<?php
require_once("models/HideoutManager.php"); 


class HideoutController {

    private HideoutManager $hideoutManager;

    public function __construct() {
        $this->hideoutManager = new HideoutManager(); 
    }


    /**
    * Generate a page
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
    * Get the hideout by id 
    * @return id_hideout
    */
    public function getHideoutById() : Hideout {
        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        // $hideout = $this->hideoutManager->get(base64_decode(urldecode($params['q'])));
        $hideout = $this->hideoutManager->get($params['q']);
        $hideout = $this->hideoutManager->get($hideout->getId_hideout());
        return $hideout; 
    }


    /**
    * Get all the hideouts
    * 
    */
    public function hideoutsList() : void {

        $hideouts = $this->hideoutManager->getAll();

        $data_page = [
            "page_description" => "Page listant les planques",
            "page_title" => "Liste des Planques",
            "page_css" => "list.css",
            "page_javascript" => ["list.js"],
            "hideouts" => $hideouts,
            "view" => "views/read/hideoutsView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a hideout (page) 
    *
    */
    public function createHideout() : void {

        $data_page = [
            "page_description" => "Page de création d'une planque",
            "page_title" => "Création d'un agent d'une planque",
            "page_css" => "form.css",
            "view" => "views/create/createHideoutView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    /**
    * Create a hideout (validation) 
    *
    */
    public function createHideoutValidation(): void {

        if($_POST) {
            $newHideout = new Hideout($_POST);
            $this->hideoutManager->createHideoutDb($newHideout); 
        }
       header("location:".URL."hideoutsList");
       exit();
    }

    /**
    * Update a hideout (page)
    *
    */
    public function updateHideout(){

        $hideout = $this->getHideoutById(); 

        $data_page = [
            "page_description" => "Page de modification d'une planque",
            "page_title" => "Modification d'une planque",
            "page_css" => "form.css",
            "hideout" => $hideout,
            "view" => "views/update/updateHideoutView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Update a hideout (validation)
    *
    */
    public function updateHideoutValidation(): void {

        if($_POST) {
            $hideout = new Hideout($_POST);
            $this->hideoutManager->updateHideoutDb($hideout); 
        }
        header("location:".URL."hideoutsList");
        exit();
    }


    /**
    * Delete a hideout
    *
    */
    public function deleteHideout(): void {

        $hideout = $this->getHideoutById();

        $this->hideoutManager->deleteHideoutDb($hideout->getId_hideout());
        unset($hideout); 
        header("location:".URL."hideoutsList");
        exit();
    }
    
}

