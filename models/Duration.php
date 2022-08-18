<?php 

class Duration {

    private int $id_duration;
    private string $start_duration;
    private string $end_duration;


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

    public function getId_duration() {return $this->id_duration; }
    public function setId_duration($id_duration) {$this->id_duration = $id_duration;return $this; }

    public function getStart_duration() {return $this->start_duration; }
    public function setStart_duration($start_duration) { $this->start_duration = $start_duration;return $this; }

    public function getEnd_duration() {return $this->end_duration;}
    public function setEnd_duration($end_duration) {$this->end_duration = $end_duration; return $this; }
    
}