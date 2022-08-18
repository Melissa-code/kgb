<?php 

class Hideout_mission {

    private int $id_hideout;
    private string $code_target; 


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

    public function getId_hideout() { return $this->id_hideout; }
    public function setId_hideout($id_hideout) { $this->id_hideout = $id_hideout; return $this; }

    public function getCode_target(){ return $this->code_target; }
    public function setCode_target($code_target) { $this->code_target = $code_target;return $this;  }

    
}



    