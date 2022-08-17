<?php
require_once("models/ContactManager.php"); 


class ContactController {

    private ContactManager $contactManager;


    public function __construct() {
        $this->contactManager = new ContactManager(); 
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
    * Get a contact by code
    * @return id_contact
    */
    // public function getContactByCode() : Contact {

    //     return $contact; 
    // }


    /**
    * Create a contact
    */
    public function createContact() : void {

        $data_page = [
            "page_description" => "Page de création d'un contact",
            "page_title" => "Création d'un contact",
            "view" => "views/createContactView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }

    public function createContactValidation(): void {
        if($_POST) {
            $newContact = new Contact($_POST);
            $this->contactManager->createContactDb($newContact); 
        }
       //var_dump($newContact); 
       header('location:'.URL."createMission");
       exit();
    }

    /**
    * Update a contact
    */
    public function updateContact(){

        // $contact = $this->getContactById(); 
        // var_dump($contact);

        // $data_page = [
        //     "page_description" => "Page de modification d'un contact",
        //     "page_title" => "Modification d'un contact",
        //     //"contact" => $contact,
        //     "view" => "views/updateContactView.php",
        //     "template" => "views/common/template.php"
        // ];
        // $this->generatePage($data_page); 
    }

    public function updateContactValidation(): void {
        // if($_POST) {
        //     $contact = new Contact($_POST);
        //     $this->contactManager->updateContactDb($agent); 
        // }
        // var_dump($contact); 
        //header('location:'.URL."createMission");
    }


    /**
    * Delete a contact
    */
    public function deleteContact(): void {
        //$contact = $this->getContactByCode();
        //$this->contactManager->deleteContactDb($contact->getCode_contact());
        //unset($contact); 
        //header('location:'.URL."createMission");
    }



}

