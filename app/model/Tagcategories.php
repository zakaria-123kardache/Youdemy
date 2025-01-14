<?php

namespace App\Model;

class Tagcategories {

    private int $id  ; 
    private string $name ;
    private string $description ; 
    
    public function __construct(){}

    public function setId (int $îd):void{
        $this->id = $îd ; 
    }
    public function setName (string $name):void{
        $this->name = $name ; 
    }
    public function setDescription (string $description):void{
        $this->description = $description ; 
    }

    public function getId(): int{
        return $this->id ;  
    }
    public function getName(): string{
        return $this->name ;  
    }
    public function getDescription() : string{
        return $this->description ;  
    }

}