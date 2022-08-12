<?php 

require_once("models/Model.php");
require_once("models/Contact.php");


class ContactManager extends Model {

    /**
    * Get all the contacts
    *
    * @return array $contacts
    */
    public function getAll() : array {
        $contacts= []; 
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Contacts");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($data as $contact) {
            $contacts[] = new Contact($contact);
        }
        
        $req->closeCursor();
        return $contacts;
    }


}