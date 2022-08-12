<?php 

class Target {

    private string $code_target;
    private string $name_target; 
    private string $firstname_target; 
    private string $datebirthday_target;
    private string $nationality_target; 


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
     * Get the value of code_target
     */ 
    public function getCode_target() {
        return $this->code_target;
    }

    /**
     * Set the value of code_target
     *
     * @return  self
     */ 
    public function setCode_target($code_target) {
        $this->code_target = $code_target;
        return $this;
    }


    /**
     * Get the value of name_target
     */ 
    public function getName_target() {
        return $this->name_target;
    }

    /**
     * Set the value of name_target
     *
     * @return  self
     */ 
    public function setName_target($name_target){
        $this->name_target = $name_target;
        return $this;
    }


    /**
     * Get the value of firstname_target
     */ 
    public function getFirstname_target() {
        return $this->firstname_target;
    }

    /**
     * Set the value of firstname_target
     *
     * @return  self
     */ 
    public function setFirstname_target($firstname_target) {
        $this->firstname_target = $firstname_target;
        return $this;
    }

    /**
     * Get the value of datebirthday_target
     */ 
    public function getDatebirthday_target(){
        return $this->datebirthday_target;
    }

    /**
     * Set the value of datebirthday_target
     *
     * @return  self
     */ 
    public function setDatebirthday_target($datebirthday_target) {
        $this->datebirthday_target = $datebirthday_target;
        return $this;
    }

    /**
     * Get the value of nationality_target
     */ 
    public function getNationality_target(){
        return $this->nationality_target;
    }

    /**
     * Set the value of nationality_target
     *
     * @return  self
     */ 
    public function setNationality_target($nationality_target){
        $this->nationality_target = $nationality_target;
        return $this;
    }
    
}
