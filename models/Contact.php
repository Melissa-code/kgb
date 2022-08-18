<?php 

class Contact {

    private string $code_contact;
    private string $name_contact;
    private string $firstname_contact;
    private string $datebirthday_contact;
    private string $nationality_contact;


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

    public function getCode_contact(){ return $this->code_contact; }
    public function setCode_contact($code_contact){ $this->code_contact = $code_contact; return $this; }

    public function getName_contact() { return $this->name_contact; }
    public function setName_contact($name_contact) { $this->name_contact = $name_contact; return $this; }

    public function getFirstname_contact() { return $this->firstname_contact; }
    public function setFirstname_contact($firstname_contact) { $this->firstname_contact = $firstname_contact;return $this; }

    public function getDatebirthday_contact() { return $this->datebirthday_contact; }
    public function setDatebirthday_contact($datebirthday_contact) { $this->datebirthday_contact = $datebirthday_contact; return $this; }

    public function getNationality_contact() { return $this->nationality_contact; }
    public function setNationality_contact($nationality_contact) { $this->nationality_contact = $nationality_contact; return $this; }

}
