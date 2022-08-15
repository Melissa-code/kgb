<?php

class Admin_mission {

    private int $id_admin;
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