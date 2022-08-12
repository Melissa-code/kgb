<?php 

class Type {

    private string $name_type;


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
     * Get the value of name_type
     */ 
    public function getName_type() {
        return $this->name_type;
    }

    /**
     * Set the value of name_type
     *
     * @return  self
     */ 
    public function setName_type($name_type){
        $this->name_type = $name_type;
        return $this;
    }
    
}