<?php 

class Agent_mission {

    private int $id_agent;
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
     * Get the value of id_agent
     */ 
    public function getId_agent(){
        return $this->id_agent;
    }

    /**
     * Set the value of id_agent
     *
     * @return  self
     */ 
    public function setId_agent($id_agent) {
        $this->id_agent = $id_agent;
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