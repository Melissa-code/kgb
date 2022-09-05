<?php

class Speciality_agent {

    private string $name_speciality; 
    private int $id_agent; 


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

    public function getName_speciality(){return $this->name_speciality;}
    public function setName_speciality($name_speciality) {$this->name_speciality = $name_speciality; return $this;}

    public function getId_agent() {return $this->id_agent; }
    public function setId_agent($id_agent){$this->id_agent = $id_agent; return $this; }



}
