<?php
require_once("models/TypeManager.php"); 


class TypeController {

    private TypeManager $typeManager;


    public function __construct() {

        $this->typeManager = new TypeManager(); 
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
    * Get a type by name
    * @return type_name
    */
    // public function getTypeByName() : Status {

    //     return $type; 
    // }


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
    public function updateType(){

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
    */
    public function deleteType(): void {
        //$type = $this->getTypeByName();
        //$type = $this->typeManager->get("");
    
        //$this->typeManager->deleteTypeDb($type->getName_type());
        //$this->typeManager->deleteTypeDb("");
        //unset($type); 
        //header('location:'.URL."createMission");
    }



}

