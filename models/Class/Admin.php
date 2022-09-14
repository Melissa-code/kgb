<?php

class Admin {

    private int $id_admin; 
    private string $name_admin;
    private string $firstname_admin;
    private string $email_admin; 
    private string $password_admin; 
    private string $creation_admin;
    private string $secret_admin;


    /* ************* Constructor ************ */ 

    public function __construct(array $data) {
        $this->hydrate($data); 
    }

    /* ************* Hydrate ************ */ 

    public function hydrate($data): void {
        foreach($data as $key=>$value) {
            $method = "set".ucfirst($key); 
            if(method_exists($this, $method)) {
                $this->$method($value); 
            }
        }
    }


    /* ************* Getters & Setters ************ */ 
 
    public function getId_admin(){ return $this->id_admin; }
    public function setId_admin($id_admin){ $this->id_admin = $id_admin; return $this;}
 
    public function getName_admin() { return $this->name_admin; }
    public function setName_admin($name_admin){ $this->name_admin = $name_admin; return $this; }

    public function getFirstname_admin(){ return $this->firstname_admin;  }
    public function setFirstname_admin($firstname_admin) { $this->firstname_admin = $firstname_admin; return $this; }

    public function getEmail_admin(){ return $this->email_admin; }
    public function setEmail_admin($email_admin){ $this->email_admin = $email_admin; return $this; }

    public function getPassword_admin() { return $this->password_admin; }
    public function setPassword_admin($password_admin) { $this->password_admin = $password_admin; return $this; }

    public function getCreation_admin() { return $this->creation_admin; }
    public function setCreation_admin($creation_admin) { $this->creation_admin = $creation_admin; return $this; }

    public function getSecret_admin() { return $this->secret_admin; }
    public function setSecret_admin($secret_admin){ $this->secret_admin = $secret_admin; return $this; }


}