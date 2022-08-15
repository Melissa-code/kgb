<?php 

class Target_mission {

    private string $code_target;
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
    public function setCode_target($code_target){
        $this->code_target = $code_target;
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