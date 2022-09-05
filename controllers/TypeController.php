<?php
require_once("models/TypeManager.php"); 


class TypeController {

    private TypeManager $typeManager;

    /* Constructor */ 
    public function __construct() {
        $this->typeManager = new TypeManager(); 
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
    * Get the type by name 
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
    * Collect all the type data 
    * Send all the type data to the typesView
    * 
    */
    public function typesList() : void {

        $types = $this->typeManager->getAll();

        $data_page = [
            "page_description" => "Page listant les types de missions",
            "page_title" => "Liste des types",
            "types" => $types,
            "view" => "views/typesView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a type
    */
    public function createType() : void {

        $data_page = [
            "page_description" => "Page de création du type d'une mission",
            "page_title" => "Création du type d'une mission",
            "view" => "views/createTypeView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function createTypeValidation(): void {
        if($_POST) {
            $newType = new Type($_POST);
            $this->typeManager->createTypeDb($newType); 
        }
        //var_dump($newType); 
        header('location:'.URL."createMission");
        exit(); 
    }

    /**
    * Update a type
    */
    public function updateType() :void {

        // $type = $this->getTypeByName(); 
        // var_dump($type);

        // $data_page = [
        //     "page_description" => "Page de modification du type d'une mission",
        //     "page_title" => "Modification du type d'une mission",
        //     //"type" => $type,
        //     "view" => "views/updateTypeView.php",
        //     "template" => "views/common/template.php"
        // ];
        // $this->generatePage($data_page); 
    }

    public function updateTypeValidation(): void {
        // if($_POST) {
        //     $type = new Type($_POST);
        //     $this->typeManager->updateTypeDb($type); 
        // }
        // var_dump($type); 
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a type
    *
    */
    public function deleteType(): void {
        $type = $this->getTypeByName();
        $this->typeManager->deleteTypeDb($type->getName_type());
        unset($type); 
        header('location:'.URL."createMission");

    }



}

