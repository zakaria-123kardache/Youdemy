<?php

// require_once('../Youdemy/app/model/Tagcategories.php');
namespace App\Model;

use App\core\Database;
use PDO;

class Categorie extends Tagcategories
{

    protected string $tablename = 'categories';
    private string $photo = 'default.jpg';


     public function __construct()
    {
        parent::__construct();
        $this->photo = 'default.jpg';
    }



    public static function instanceNameDescription(string $name, string $description)
    {

        $instance = new self();

        $instance->setName($name);
        $instance->setDescription($description);

        return $instance;
    }




    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): void
    {
        $this->photo = $photo ?: '';
    }


    public function __toString()
    {
        // return "(Categorie)=> id :".$this->id."(categorie) => name :".$this->name.
        // "(categorie) => description :".$this->description ; 

        return parent::__toString() . " (Categorie) => photo: " . $this->photo;;
    }



// overdit method creat 

    public function create(): self
    {
        $name = $this->getName();
        $description = $this->getDescription();
        $photo = $this->getPhoto();

        $query = "INSERT INTO categories (name, description, photo) 
                  VALUES (:name, :description, :photo)";
        $stmt = Database::getInstance()->getConnection()->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':photo', $photo);

        $stmt->execute();

        $this->setId(Database::getInstance()->getConnection()->lastInsertId());

        return $this;
    }


    public function findAll(): array
    {
        $query = "SELECT * FROM $this->tablename";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];
        
        foreach ($results as $result) {
            $category = new self(); 
            
            foreach ($result as $key => $value) {
                if ($key === 'photo' && empty($value)) {
                    $value = 'default.jpg';
                }
                
                $setter = 'set' . ucfirst($key);
                if (method_exists($category, $setter)) {
                    $category->$setter($value);
                }
            }
            
            $categories[] = $category;
        }
        
        return $categories;
    }
    
}
