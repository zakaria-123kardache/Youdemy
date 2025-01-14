<?php
namespace App\Model; 
// require_once('./app/model/TagCategories.php');


class Tags extends Tagcategories {
    private string $logo ;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogo(string $logo):void{
        $this->logo =$logo ; 
    }

    public function setLogo():string{
        return $this->logo ; 
    }

    public static function instanceWithNameDescriptionLogo(string $name, string $description , string $logo){
        $instance = new self ();
        $instance->setName($name) ; 
        $instance->setDescription($description); 
        $instance->logo = $logo ; 

        return $instance ; 

    }

    public function __toString()
    {
        parent::__toString()." (logo) => ".$this->logo ;  
    }
    

}