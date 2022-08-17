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


    /**
    * Get one contact only
    * @return Contact $contact
    */
    public function get($code_contact) : Contact {
        $pdo = $this->getDb();
        $req = $pdo->prepare("SELECT * FROM Contacts WHERE code_contact = :code_contact");
        $req->bindValue(':code_contact', $code_contact, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(); 
        $contact = new Contact($data); 
        $req->closeCursor();
        return $contact;
    }


    /**
    * Create a contact
    */
    public function createContactDb(Contact $newContact): void {

        $code_contact = $_POST['code_contact']; 
        $name_contact = $_POST['name_contact']; 
        $firstname_contact = $_POST['firstname_contact']; 
        $datebirthday_contact = $_POST['datebirthday_contact']; 
        $nationality_contact = $_POST['nationality_contact']; 

        $pdo = $this->getDb();
        $req = $pdo->prepare(
            'SELECT
                (SELECT count(*) as numberCode FROM Contacts WHERE code_contact = :code_contact),
                (SELECT count(*) as numberName FROM Contacts WHERE name_contact = :name_contact),
                (SELECT count(*) as numberFirstname FROM Contacts WHERE firstname_contact = :firstname_contact),
                (SELECT count(*) as numberDatebirthday FROM Contacts WHERE datebirthday_contact = :datebirthday_contact),
                (SELECT count(*) as numberNationality FROM Contacts WHERE nationality_contact = :nationality_contact)
            '); 
        $req->bindValue(':code_contact', $code_contact, PDO::PARAM_STR); 
        $req->bindValue(':name_contact', $name_contact, PDO::PARAM_STR);
        $req->bindValue(':firstname_contact', $firstname_contact, PDO::PARAM_STR);
        $req->bindValue(":datebirthday_contact", $datebirthday_contact, PDO::PARAM_STR);
        $req->bindValue(":nationality_contact", $nationality_contact, PDO::PARAM_STR);
        $req->execute();
 
        while($verification = $req->fetch()){
            if($verification[0] >= 1 || $verification[1] >= 1 && $verification[2] >= 1 && $verification[3] >= 1 && $verification[4] >= 1){
                //echo "ce contact existe déjà"; 
                header('location:'.URL."createContact"); 
                exit();
            }
            else {
                //echo "Création d'un nouveau contact";      
                $req = $pdo->prepare("INSERT INTO Contacts (code_contact, name_contact, firstname_contact, datebirthday_contact, nationality_contact) VALUES (:code_contact, :name_contact, :firstname_contact, :datebirthday_contact, :nationality_contact)");
                $req->bindValue(":code_contact",$code_contact, PDO::PARAM_STR);
                $req->bindValue(":name_contact",$name_contact, PDO::PARAM_STR);
                $req->bindValue(":firstname_contact", $firstname_contact, PDO::PARAM_STR);
                $req->bindValue(":datebirthday_contact", $datebirthday_contact, PDO::PARAM_STR);
                $req->bindValue(":nationality_contact", $nationality_contact, PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
    }

    
    /**
    * Update a contact
    */
    public function updateContactDb(Contact $contact): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Contacts SET code_contact = :code_contact');
        $req->bindValue(':code_contact', $contact->getCode_contact(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }


    /**
    * Delete a contact
    */
    public function deleteContactDb(int $code_contact): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Contacts WHERE code_contact = :code_contact');
        $req->bindValue(':code_contact', $code_contact, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }




}