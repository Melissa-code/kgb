<?php 

class Target_mission {

    private string $code_target;
    private string $code_mission;

    
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

    public function getCode_target() { return $this->code_target; }
    public function setCode_target($code_target){ $this->code_target = $code_target; return $this; }

    public function getCode_mission() { return $this->code_mission; }
    public function setCode_mission($code_mission) { $this->code_mission = $code_mission; return $this; }

    
}