<?php

// require_once('../Youdemy/app/model/Tagcategories.php');
namespace App\Model ; 

class Categorie extends Tagcategories {

    protected string $tablename = 'categories';


    public function __construct(){
        parent::__construct();
        
    }

    
    public static function instanceNameDescription(string $name , string $description){

        $instance = new self ();

        $instance->setName($name) ;
        $instance->setDescription($description); 

        return $instance ; 

    }
    public function __toString()
    {
        // return "(Categorie)=> id :".$this->id."(categorie) => name :".$this->name.
        // "(categorie) => description :".$this->description ; 

        return parent::__toString();
    }

}