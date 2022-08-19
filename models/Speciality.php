<?php

class Speciality {

    private string $name_speciality; 


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

    public function getName_speciality() { return $this->name_speciality;}
    public function setName_speciality($name_speciality) { $this->name_speciality = $name_speciality; return $this;}


}
