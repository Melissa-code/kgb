<?php 
require_once("models/Class/Model.php");
require_once("models/Class/Contact.php");


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
    *
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
    * Create a contact in the database
    *
    */
    public function createContactDb(Contact $newContact): void {

        $pdo = $this->getDb();
        // Count the duplicates contacts in the DB 
        $req = $pdo->prepare(
            'SELECT
                (SELECT count(*) as numberCode FROM Contacts WHERE code_contact = :code_contact),
                (SELECT count(*) as numberName FROM Contacts WHERE name_contact = :name_contact),
                (SELECT count(*) as numberFirstname FROM Contacts WHERE firstname_contact = :firstname_contact),
                (SELECT count(*) as numberDatebirthday FROM Contacts WHERE datebirthday_contact = :datebirthday_contact),
                (SELECT count(*) as numberNationality FROM Contacts WHERE nationality_contact = :nationality_contact)
            '); 
        $req->bindValue(':code_contact', $newContact->getCode_contact(), PDO::PARAM_STR); 
        $req->bindValue(':name_contact', $newContact->getName_contact(), PDO::PARAM_STR);
        $req->bindValue(':firstname_contact', $newContact->getFirstname_contact(), PDO::PARAM_STR);
        $req->bindValue(":datebirthday_contact", $newContact->getDatebirthday_contact(), PDO::PARAM_STR);
        $req->bindValue(":nationality_contact", $newContact->getNationality_contact(), PDO::PARAM_STR);
        $req->execute();

        // Check if the contact already exists in the DB 
        while($verification = $req->fetch()){
            if($verification[0] >= 1 || ($verification[1] >= 1 && $verification[2] >= 1 && $verification[3] >= 1 && $verification[4] >= 1)) {
                MessagesClass::addAlertMsg("ERREUR : ce contact existe déjà.", MessagesClass::RED_COLOR); 
                header("location:".URL."createContact"); 
                exit();
            }
            else {     
                // Create the contact in the DB 
                $req = $pdo->prepare("INSERT INTO Contacts (code_contact, name_contact, firstname_contact, datebirthday_contact, nationality_contact) VALUES (:code_contact, :name_contact, :firstname_contact, :datebirthday_contact, :nationality_contact)");
                $req->bindValue(":code_contact", $newContact->getCode_contact(), PDO::PARAM_STR);
                $req->bindValue(":name_contact", $newContact->getName_contact(), PDO::PARAM_STR);
                $req->bindValue(":firstname_contact", $newContact->getFirstname_contact(), PDO::PARAM_STR);
                $req->bindValue(":datebirthday_contact", $newContact->getDatebirthday_contact(), PDO::PARAM_STR);
                $req->bindValue(":nationality_contact", $newContact->getNationality_contact(), PDO::PARAM_STR);
                $req->execute();
                $req->closeCursor();
            }
        }
        MessagesClass::addAlertMsg("Le contact a bien été créé.", MessagesClass::GREEN_COLOR); 
    }

    
    /**
    * Update a contact in the database
    *
    */
    public function updateContactDb(Contact $contact): void {
        $pdo = $this->getDb();
        $req =$pdo->prepare('UPDATE Contacts SET code_contact = :code_contact, name_contact = :name_contact, firstname_contact = :firstname_contact, datebirthday_contact = :datebirthday_contact, nationality_contact = :nationality_contact WHERE code_contact = :oldcode_contact');
        $req->bindValue(':code_contact', $contact->getCode_contact(), PDO::PARAM_STR);
        $req->bindValue(':oldcode_contact', $contact->getOldcode_contact(), PDO::PARAM_STR);
        $req->bindValue(':name_contact', $contact->getName_contact(), PDO::PARAM_STR);
        $req->bindValue(':firstname_contact', $contact->getFirstname_contact(), PDO::PARAM_STR);
        $req->bindValue(':datebirthday_contact', $contact->getDatebirthday_contact(), PDO::PARAM_STR);
        $req->bindValue(':nationality_contact', $contact->getNationality_contact(), PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
        MessagesClass::addAlertMsg("Le contact a bien été modifié.", MessagesClass::GREEN_COLOR); 
    }


    /**
    * Delete a contact in the database
    *
    */
    public function deleteContactDb(string $code_contact): void {
        $pdo = $this->getDb();
        $req = $pdo->prepare('DELETE FROM Contacts WHERE code_contact = :code_contact');
        $req->bindValue(':code_contact', $code_contact, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
        MessagesClass::addAlertMsg("Le contact a bien été supprimé.", MessagesClass::GREEN_COLOR); 
    }

}