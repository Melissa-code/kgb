<?php

class Status {

    private string $code_status; 
    private string $oldcode_status; 


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

    /* ************* Getters & setters ************ */ 

    public function getCode_status() { return $this->code_status; }
    public function setCode_status($code_status) { $this->code_status = $code_status; return $this; }
    
    public function getOldcode_status() { return $this->oldcode_status; }
    public function setOldcode_status($oldcode_status) { $this->oldcode_status = $oldcode_status; return $this; }


}