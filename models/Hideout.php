<?php 

class Hideout {

    private int $id_hideout; 
    private string $address_hideout; 
    private string $country_hideout; 
    private string $type_mission; 


    /* ************* Constructor ************ */ 

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    /* ************** Hydrate **************** */ 

    public function hydrate(array $data) : void {
        foreach($data as $attribute => $value) {
            $setterMethod = 'set'.ucfirst($attribute); 
            if(method_exists($this, $setterMethod)){
                $this->$setterMethod($value);
            }
        }
    }

    /* ************** Getter & Setter **************** */ 

    /**
     * Get the value of id_hideout
     */ 
    public function getId_hideout(){
        return $this->id_hideout;
    }

    /**
     * Set the value of id_hideout
     *
     * @return  self
     */ 
    public function setId_hideout($id_hideout) {
        $this->id_hideout = $id_hideout;
        return $this;
    }

    
    /**
     * Get the value of address_hideout
     */ 
    public function getAddress_hideout() {
        return $this->address_hideout;
    }

    /**
     * Set the value of address_hideout
     *
     * @return  self
     */ 
    public function setAddress_hideout($address_hideout){
        $this->address_hideout = $address_hideout;
        return $this;
    }
    

    /**
     * Get the value of country_hideout
     */ 
    public function getCountry_hideout(){
        return $this->country_hideout;
    }

    /**
     * Set the value of country_hideout
     *
     * @return  self
     */ 
    public function setCountry_hideout($country_hideout){
        $this->country_hideout = $country_hideout;

        return $this;
    }


    /**
     * Get the value of type_mission
     */ 
    public function getType_mission() {
        return $this->type_mission;
    }

    /**
     * Set the value of type_mission
     *
     * @return  self
     */ 
    public function setType_mission($type_mission) {
        $this->type_mission = $type_mission;
        return $this;
    }

}