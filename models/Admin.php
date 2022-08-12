<?php

class Admin {

    private int $id_admin; 
    private string $name_admin;
    private string $firstname_admin;
    private string $email_admin; 
    private string $password_admin; 
    private string $creation_admin;
    private string $secret_admin;



    public function __construct(array $data) {
        $this->hydrate($data); 
    }


    public function hydrate($data): void {
        foreach($data as $key=>$value) {
            $method = "set".ucfirst($key); 
            if(method_exists($this, $method)) {
                $this->$method($value); 
            }
        }
    }

    /* ************* Getters & Setters ************ */ 

    /**
     * Get the value of id_admin
     */  
    public function getId_admin(){
        return $this->id_admin; 
    }

    /**
     * Set the value of id_admin
     *
     * @return  self
     */ 
    public function setId_admin($id_admin){
        $this->id_admin = $id_admin;
        return $this;
    }


    /**
     * Get the value of name_admin
     */  
    public function getName_admin() {
        return $this->name_admin;
    }

    /**
     * Set the value of name_admin
     *
     * @return  self
     */ 
    public function setName_admin($name_admin){
        $this->name_admin = $name_admin;
        return $this;
    }


    /**
     * Get the value of firstname_admin
     */ 
    public function getFirstname_admin(){
        return $this->firstname_admin;
    }

    /**
     * Set the value of firstname_admin
     *
     * @return  self
     */ 
    public function setFirstname_admin($firstname_admin) {
        $this->firstname_admin = $firstname_admin;
        return $this;
    }


    /**
     * Get the value of email_admin
     */ 
    public function getEmail_admin(){
        return $this->email_admin;
    }

    /**
     * Set the value of email_admin
     *
     * @return  self
     */ 
    public function setEmail_admin($email_admin){
        $this->email_admin = $email_admin;
        return $this;
    }


    /**
     * Get the value of password_admin 
     */ 
    public function getPassword_admin() {
        return $this->password_admin;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword_admin($password_admin) {
        $this->password_admin = $password_admin;
        return $this;
    }


    /**
     * Get the value of creation_admin
     */ 
    public function getCreation_admin() {
        return $this->creation_admin;
    }

    /**
     * Set the value of creation_admin
     *
     * @return  self
     */ 
    public function setCreation_admin($creation_admin) {
        $this->creation_admin = $creation_admin;
        return $this;
    }


    /**
     * Get the value of secret_admin
     */ 
    public function getSecret_admin() {
        return $this->secret_admin;
    }

    /**
     * Set the value of secret_admin
     *
     * @return  self
     */ 
    public function setSecret_admin($secret_admin){
        $this->secret_admin = $secret_admin;
        return $this;
    }


}