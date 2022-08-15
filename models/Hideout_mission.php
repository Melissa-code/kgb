<?php 

class Hideout_mission {

    private int $id_hideout;
    private string $code_target; 


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
     * Get the value of id_hideout
     */ 
    public function getId_hideout() {
        return $this->id_hideout;
    }

    /**
     * Set the value of id_hideout
     *
     * @return  self
     */ 
    public function setId_hideout($id_hideout) {
        $this->id_hideout = $id_hideout;
        return $this;
    }


    /**
     * Get the value of code_target
     */ 
    public function getCode_target(){
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

    
}



    