<?php

class Status {

    private string $code_status; 


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
     * Get the value of code_status
     */ 
    public function getCode_status() {
        return $this->code_status;
    }

    /**
     * Set the value of code_status
     *
     * @return  self
     */ 
    public function setCode_status($code_status) {
        $this->code_status = $code_status;
        return $this;
    }


}