<?php 

class Contact {

    private string $code_contact;
    private string $name_contact;
    private string $firstname_contact;
    private string $datebirthday_contact;
    private string $nationality_contact;


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
     * Get the value of code_contact
     */ 
    public function getCode_contact(){
        return $this->code_contact;
    }

    /**
     * Set the value of code_contact
     *
     * @return  self
     */ 
    public function setCode_contact($code_contact){
        $this->code_contact = $code_contact;
        return $this;
    }


    /**
     * Get the value of name_contact
     */ 
    public function getName_contact() {
        return $this->name_contact;
    }

    /**
     * Set the value of name_contact
     *
     * @return  self
     */ 
    public function setName_contact($name_contact) {
        $this->name_contact = $name_contact;
        return $this;
    }


    /**
     * Get the value of firstname_contact
     */ 
    public function getFirstname_contact() {
        return $this->firstname_contact;
    }

    /**
     * Set the value of firstname_contact
     *
     * @return  self
     */ 
    public function setFirstname_contact($firstname_contact) {
        $this->firstname_contact = $firstname_contact;
        return $this;
    }


    /**
     * Get the value of datebirthday_contact
     */ 
    public function getDatebirthday_contact() {
        return $this->datebirthday_contact;
    }

    /**
     * Set the value of datebirthday_contact
     *
     * @return  self
     */ 
    public function setDatebirthday_contact($datebirthday_contact) {
        $this->datebirthday_contact = $datebirthday_contact;

        return $this;
    }


    /**
     * Get the value of nationality_contact
     */ 
    public function getNationality_contact() {
        return $this->nationality_contact;
    }

    /**
     * Set the value of nationality_contact
     *
     * @return  self
     */ 
    public function setNationality_contact($nationality_contact) {
        $this->nationality_contact = $nationality_contact;
        return $this;
    }

}
