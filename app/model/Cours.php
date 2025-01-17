<?php
namespace App\Model;

use App\core\Database;
use PDO;

class Cours {
    private int $id = 0; 
    private string $name =''; 
    private string $description='' ;
    private string $photo =''; 
    private string $contenu =''; 
    private array $tags = [] ; 
    private ?Categorie $categorie = null; 
    private ?Enseignant $enseignant = null; 
    

    public function __construct(){}

    public function instance(string $description , string $name ,string $photo , string $contenu , array $tags , Categorie $categorie , enseignant $enseignant){
        $instance = new self ();
        $instance->name = $name ; 
        $instance->description = $description ; 
        $instance->photo = $photo ; 
        $instance->contenu = $contenu ; 
        $instance->tags = $tags ; 
        $instance->categorie = $categorie ; 
        $instance->enseignant = $enseignant ; 

        return $instance ;

    }


    public function getId() : int 
    {
        return $this->id ;
    }
    public function getName() : string 
    {
        return $this->name ;
    }
    public function getDescription() : string 
    {
        return $this->description;
    }

    public function getPhoto() : string
    {
        return $this->photo;
    }

    public function getContenu() : string
    {
        return $this->contenu ;
    }

    public function getTags() : array
    {
        return $this->tags ;
    }

    public function getCategorie() : ?Categorie
    {
        return $this->categorie ;
    }


    public function getEnseignant() : Enseignant
    {
        return $this->enseignant;
    }


    public function setId(int $id) :void {
         $this->id = $id;
    }

    public function setName(string $name) :void {
         $this->name;
    }

    public function setDescription(string $description) :void {
         $this->description;
    }

    public function setPhoto(string $photo) :void {
         $this->photo;
    }

    public function setContenu(string $contenu) :void {
         $this->contenu;
    }

    public function setTags(array $tags) : void
    {
        $this->tags;
    }

    public function setCategorie(Categorie $categorie) : void
    {
        $this->categorie ;
    }

    public function setEnseignant(Enseignant $enseignant) : void {
         $this->enseignant;
    }


    // public function __toString()
    // {
    //     return "(Cour) => id : ". $this->id. ",cour name :".$this->name.
    //     ",cour description : ".$this->description.",cour photo : ".$this->photo.
    //     ",cour contenu : ".$this->contenu."cour tags". implode(", ",$this->tags)."cour categorie : ".
    //     $this->categorie.", cour enseignant : ".$this->enseignant ;
    // }



    public function create(Cours $cour): Cours
{
    $query = "INSERT INTO cours (name, description, contenu, photo, categorie_id) 
              VALUES (:name, :description, :contenu, :photo, :categorie_id)";


    $stmt = Database::getInstance()->getConnection()->prepare($query);

    $stmt->bindParam(':name', $cour->getName());
    $stmt->bindParam(':description', $cour->getDescription());
    $stmt->bindParam(':contenu', $cour->getContenu());
    $stmt->bindParam(':photo', $cour->getPhoto());
    $stmt->bindParam(':categorie_id', $cour->getCategorie()->getId());
    // $stmt->bindParam(':categorie_id', $categorie->getId(), PDO::PARAM_INT);

    $stmt->execute();
    $cour->setId(Database::getInstance()->getConnection()->lastInsertId());

    return $cour;
}




    
}

