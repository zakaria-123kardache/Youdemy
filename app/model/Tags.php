<?php
namespace App\Model; 
// require_once('./app/model/TagCategories.php');


class Tags extends Tagcategories {

    private string $logo ;
    protected string $tablename = 'tags';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogo():string{
        return $this->logo ; 
    }

    public function setLogo(string $logo):void{
        $this->logo = $logo ; 
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
        return parent::__toString()." (logo) => ".$this->logo ;  
    }
    

}