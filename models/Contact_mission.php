<?php 

class Contact_mission {

    private string $code_contact; 
    private string $code_mission; 



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
    public function getCode_contact() {
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
     * Get the value of code_mission
     */ 
    public function getCode_mission() {
        return $this->code_mission;
    }

    /**
     * Set the value of code_mission
     *
     * @return  self
     */ 
    public function setCode_mission($code_mission) {
        $this->code_mission = $code_mission;
        return $this;
    }

    
}