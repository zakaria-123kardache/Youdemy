<?php

class Tagcategories {

    private int $id ; 
    private string $name ;
    private string $description ; 
    
    public function __construct(){}

    public function getId (int $îd):void{
        $this->id = $îd ; 
    }
    public function getName (string $name):void{
        $this->name = $name ; 
    }
    public function getDescription (string $description):void{
        $this->description = $description ; 
    }

    public function setId() : int{
        return $this->id ;  
    }
    public function setName() : string{
        return $this->name ;  
    }
    public function setDescription() : string{
        return $this->description ;  
    }

}