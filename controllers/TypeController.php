<?php
require_once("models/TypeManager.php"); 

class TypeController {

    private TypeManager $typeManager;

    public function __construct() {
        $this->typeManager = new TypeManager(); 
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
    * Get the type by name function
    *
    * @return name_type
    */
    public function getTypeByName() : Type {
        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        // $type = $this->typeManager->get(base64_decode(urldecode($params['q'])));
        $type = $this->typeManager->get($params['q']);
        $type = $this->typeManager->get($type->getName_type());
        return $type; 
    }

    /**
    * Get the list of the types function
    * 
    */
    public function typesList() : void {

        $types = $this->typeManager->getAll();

        $data_page = [
            "page_description" => "Page listant les types de missions",
            "page_title" => "Liste des types",
            "page_css" => "list.css",
            "page_javascript" => ["list.js"],
            "types" => $types,
            "view" => "views/read/typesView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a type (page) function
    *
    */
    public function createType() : void {

        $data_page = [
            "page_description" => "Page de création du type d'une mission",
            "page_title" => "Création du type d'une mission",
            "page_css" => "form.css",
            "view" => "views/create/createTypeView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a type (validation) function
    *
    */
    public function createTypeValidation(): void {
        if($_POST) {
            $newType = new Type($_POST);
            $this->typeManager->createTypeDb($newType); 
        }
        header("location:".URL."typesList");
        exit(); 
    }

    /**
    * Update a type (page) function
    *
    */
    public function updateType() :void {

        $type = $this->getTypeByName(); 

        $data_page = [
            "page_description" => "Page de modification du type d'une mission",
            "page_title" => "Modification du type d'une mission",
            "page_css" => "form.css",
            "type" => $type,
            "view" => "views/update/updateTypeView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function updateTypeValidation(): void {
        if($_POST) {
            $type = new Type($_POST);
            $this->typeManager->updateTypeDb($type); 
        }
        header("location:".URL."typesList");
        exit(); 
    }


    /**
    * Delete a type function 
    *
    */
    public function deleteType(): void {
        $type = $this->getTypeByName();
        $this->typeManager->deleteTypeDb($type->getName_type());
        unset($type); 
        header("location:".URL."typesList");
        exit(); 
    }
}

