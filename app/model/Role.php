<?php
namespace App\Model;
class Role {

    private $id ; 
    private $name ;
    private $description ; 
    private $logo ; 
    
    public function construct (){}

    public static function instance (string $name, string $description, string $logo){
        $instance = new self();
        $instance-> name =$name ; 
        $instance-> description =$description ;
        $instance-> logo = $logo ;  
        return $instance ; 
    } 

    public function getId (int $id){
        $this-> $this-> id = $id ;
    } 
    public function getName (int $name){
        $this-> $this-> name = $name ;
    } 
    public function getDescription (int $description){
        $this-> $this -> description = $description ;
    } 
    public function getLogo (int $logo){
        $this-> $this -> logo = $logo ;
    } 


    public function setId () :int{
        return $this->id;  
    }
    public function setName() :string{
        return $this->name ;
    }

    public function setdescription() :string{
        return $this->description ; 
    }
    public function setLogo () :string{
        return $this->logo ; 
    }




}