<?php 

class Hideout {

    private int $id_hideout; 
    private string $address_hideout; 
    private string $country_hideout; 
    private string $type_hideout; 

    private int $oldid_hideout; 


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

    public function getId_hideout(){return $this->id_hideout; }
    public function setId_hideout($id_hideout) { $this->id_hideout = $id_hideout;return $this; }

    public function getAddress_hideout() {return $this->address_hideout; }
    public function setAddress_hideout($address_hideout){$this->address_hideout = $address_hideout;return $this; }
 
    public function getCountry_hideout(){ return $this->country_hideout; }
    public function setCountry_hideout($country_hideout){ $this->country_hideout = $country_hideout;return $this;}

    public function getType_hideout() { return $this->type_hideout;}
    public function setType_hideout($type_hideout) {$this->type_hideout = $type_hideout; return $this; }

    public function getOldid_hideout() { return $this->oldid_hideout; }
    public function setOldid_hideout($oldid_hideout) { $this->oldid_hideout = $oldid_hideout; return $this; }
    
}