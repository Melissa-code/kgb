<?php

class Mission {

    /* ************** Attributes ************* */ 

    private $code_mission; 
    private $title_mission; 
    private ?string $description_mission = null; 
    private $country_mission; 
    private $id_duration; 
    private $code_status; 
    private $name_type; 
    private $name_speciality; 

    private array $id_agent;
    private array $code_contact;
    private array $code_target; 
    private array $id_hideout = []; 


    /* ************* Constructor ************ */ 

    public function __construct(array $data) {
        $this->hydrate($data);
    }


    /* ************** Hydrate **************** */ 

    public function hydrate(array $data) : void {
        foreach($data as $attribute => $value) {
            $setterMethod = 'set'.ucfirst($attribute); 
            if(method_exists($this, $setterMethod)){
                $this->$setterMethod($value);
            }
        }
    }


    /* ************* Getters & Setters ************ */ 

    public function getCode_mission(){return $this->code_mission;}

    public function setCode_mission(string $code_mission){
        if(strlen($code_mission) >= 3 && strlen($code_mission) <= 50){
            $this->code_mission = $code_mission;
            return $this;
        }
    }

    public function getTitle_mission(){ return $this->title_mission;}

    public function setTitle_mission(string $title_mission){
        if(strlen($title_mission) >= 3 && strlen($title_mission) <= 100){
            $this->title_mission = $title_mission;
            return $this;
        }
    }
    
    public function getDescription_mission(){ return $this->description_mission;}

    public function setDescription_mission(?string $description_mission){
        if(strlen($description_mission) >= 3 && strlen($description_mission) <= 180){
            $this->description_mission= $description_mission;
            return $this;
        }
    }

    public function getCountry_mission(){return $this->country_mission; }
    public function setCountry_mission(string $country_mission){ $this->country_mission = $country_mission; return $this; }
  

    public function getId_duration(){ return $this->id_duration; }
    public function setId_duration(int $id_duration){ $this->id_duration = $id_duration; return $this;  }


    public function getCode_status(){ return $this->code_status; }
    public function setCode_status(string $code_status){$this->code_status = $code_status; return $this; }


    public function getName_type(){return $this->name_type; }
    public function setName_type($name_type){ $this->name_type = $name_type; return $this; }

    
    public function getName_speciality() { return $this->name_speciality;}
    public function setName_speciality($name_speciality) {$this->name_speciality = $name_speciality;return $this; }


    public function getId_agent(){return $this->id_agent; }
    public function setId_agent($id_agent){$this->id_agent = $id_agent;return $this; }


    public function getCode_contact() { return $this->code_contact; }
    public function setCode_contact($code_contact) { $this->code_contact = $code_contact; return $this; }


    public function getCode_target() { return $this->code_target; }
    public function setCode_target($code_target) { $this->code_target = $code_target; return $this; }


    public function getId_hideout() { return $this->id_hideout; }
    public function setId_hideout($id_hideout) {  $this->id_hideout = $id_hideout; return $this; }




}


