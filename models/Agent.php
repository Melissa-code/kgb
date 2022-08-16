<?php 

class Agent {

    private int $id_agent;
    private string $name_agent; 
    private string $firstname_agent; 
    private string $datebirthday_agent;
    private string $nationality_agent; 


    /* ************* Constructor  ************ */ 
    
    public function __construct(array $data) {
        $this->hydrate($data); 
    }

    /* ************* hydrate ************ */ 

    public function hydrate($data): void {
        foreach($data as $key=>$value) {
            $method = "set".ucfirst($key); 
            if(method_exists($this, $method)) {
                $this->$method($value); 
            }
        }
    }


    /* ************* Getters & Setters ************ */ 

    public function getId_agent(){ return $this->id_agent; }
    public function setId_agent($id_agent){ $this->id_agent = $id_agent; return $this;}

    public function getName_agent() {return $this->name_agent;}
    public function setName_agent($name_agent){ $this->name_agent = $name_agent;return $this; }

    public function getFirstname_agent() {return $this->firstname_agent; }
    public function setFirstname_agent($firstname_agent) { $this->firstname_agent = $firstname_agent;return $this;}

    public function getDatebirthday_agent() {return $this->datebirthday_agent; }
    public function setDatebirthday_agent($datebirthday_agent){ $this->datebirthday_agent = $datebirthday_agent; return $this; }

    public function getNationality_agent(){return $this->nationality_agent; }
    public function setNationality_agent($nationality_agent){$this->nationality_agent = $nationality_agent; return $this; }

}
