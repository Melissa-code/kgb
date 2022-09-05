<?php 

class Target {

    private string $code_target;
    private string $name_target; 
    private string $firstname_target; 
    private string $datebirthday_target;
    private string $nationality_target; 


    private string $oldCode_target;


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

    public function getCode_target() {return $this->code_target;}
    public function setCode_target($code_target) {$this->code_target = $code_target; return $this; }

    public function getName_target() { return $this->name_target; }
    public function setName_target($name_target){ $this->name_target = $name_target; return $this; }

    public function getFirstname_target() {return $this->firstname_target;}
    public function setFirstname_target($firstname_target) { $this->firstname_target = $firstname_target; return $this; }

    public function getDatebirthday_target(){ return $this->datebirthday_target; }
    public function setDatebirthday_target($datebirthday_target) { $this->datebirthday_target = $datebirthday_target;return $this;}

    public function getNationality_target(){ return $this->nationality_target; }
    public function setNationality_target($nationality_target){ $this->nationality_target = $nationality_target;return $this;  }
  
    public function getOldCode_target(){ return $this->oldCode_target; }
    public function setOldCode_target($oldCode_target) { $this->oldCode_target = $oldCode_target; return $this; }

    
}
