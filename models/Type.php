<?php 

class Type {

    private string $name_type;

    private string $oldname_type;


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

    public function getName_type() { return $this->name_type; }
    public function setName_type($name_type){ $this->name_type = $name_type; return $this; }
    
    public function getOldname_type(){ return $this->oldname_type; }
    public function setOldname_type($oldname_type){ $this->oldname_type = $oldname_type;return $this; }

}