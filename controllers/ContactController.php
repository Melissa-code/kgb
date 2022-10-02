<?php
require_once("models/ContactManager.php"); 

class ContactController {

    private ContactManager $contactManager;


    public function __construct() {
        $this->contactManager = new ContactManager(); 
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
    * Get the contact by code 
    *
    * @return code_contact
    */
    public function getContactByCode() : Contact {
        $query = $_SERVER;
        $url = $query['SERVER_NAME'].":".$query['SERVER_PORT'].$query['REQUEST_URI'];
        $l = parse_url($url);
        parse_str($l['query'], $params);
        // $contact = $this->contactManager->get(base64_decode(urldecode($params['q'])));
        $contact = $this->contactManager->get($params['q']);
        $contact = $this->contactManager->get($contact->getCode_contact());
        return $contact ;
    }

    /**
    * Get all the contacts (array)
    * 
    */
    public function contactsList() : void {

        $contacts  = $this->contactManager->getAll();

        $data_page = [
            "page_description" => "Page listant les contacts",
            "page_title" => "Liste des contacts",
            "contacts" => $contacts,
            "view" => "views/read/contactsView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a contact (page)
    *
    */
    public function createContact() : void {

        $data_page = [
            "page_description" => "Page de création d'un contact",
            "page_title" => "Création d'un contact",
            "page_css" => "form.css",
            "view" => "views/create/createContactView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Create a contact (validation)
    *
    */
    public function createContactValidation(): void {
        if($_POST) {
            $newContact = new Contact($_POST);
            $this->contactManager->createContactDb($newContact); 
        }
       header("location:".URL."contactsList");
       exit();
    }


    /**
    * Update a contact (page)
    *
    */
    public function updateContact(){

        $contact = $this->getContactByCode(); 

        $data_page = [
            "page_description" => "Page de modification d'un contact",
            "page_title" => "Modification d'un contact",
            "page_css" => "form.css",
            "contact" => $contact,
            "view" => "views/update/updateContactView.php",
            "template" => "views/common/template.php"
        ];
        $this->generatePage($data_page); 
    }


    /**
    * Update a contact (validation)
    *
    */
    public function updateContactValidation(): void {
        if($_POST) {
            $contact = new Contact($_POST);
            $this->contactManager->updateContactDb($contact); 
        }
        header("location:".URL."contactsList");
        exit();
    }


    /**
    * Delete a contact
    *
    */
    public function deleteContact(): void {
        $contact = $this->getContactByCode();
        $this->contactManager->deleteContactDb($contact->getCode_contact());
        unset($contact); 
        header("location:".URL."contactsList");
        exit();
    }

}

