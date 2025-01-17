<?php
namespace App\Model;

use App\core\Database;
use Exception;
use PDO;

class Cours {
    private int $id = 0; 
    private string $name =''; 
    private string $description='' ;
    private string $photo =''; 
    private string $contenu =''; 
    private array $tags = [] ; 
    private Categorie $categorie ; 
    private Enseignant $enseignant ; 
     
    

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

    public function getCategorie() : Categorie
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



//     public function create(Cours $cour): Cours
// {
    
//     $query = "INSERT INTO cours (name, description, contenu, photo, categorie_id) 
//               VALUES (:name, :description, :contenu, :photo, :categorie_id)";

    
//     $stmt = Database::getInstance()->getConnection()->prepare($query);

//     $stmt->bindParam(':name', $cour->getName());
//     $stmt->bindParam(':description', $cour->getDescription());
//     $stmt->bindParam(':contenu', $cour->getContenu());
//     $stmt->bindParam(':photo', $cour->getPhoto());
//     $stmt->bindParam(':categorie_id', $cour->getCategorie()->getId(), PDO::PARAM_INT );
//     // $stmt->bindParam(':categorie_id', $cour->getId(), PDO::PARAM_INT);

//     $stmt->execute();
//     $cour->setId(Database::getInstance()->getConnection()->lastInsertId());

//     return $cour;
// }


public function create(Cours $cours):Cours{

    $query = "INSERT INTO cours (name, description, contenu, photo, categorie_id)
    VALUES('".$cours->getName()."' ,'"
    .$cours->getDescription()."' , '"
    .$cours->getContenu()."' ,'"
    .$cours->getPhoto()."' ,'"
    .$cours->getCategorie()->getId()."') ";

    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute();

    $cours->setId(Database::getInstance()->getConnection()->lastInsertId());

    return $cours;
}


public function delete (int $id ):int 
{
    $query = "DELETE FROM cours WHERE id =".$id .";";
    $stmt = Database::getINstance()->getConnection()->prepare($query);
    $stmt->execute();

    return $stmt->rowCount();
}


public function update(Cours $cours):Cours
{

    $name = $cours->getName();
    $description = $cours->getDescription();
    $contenu = $cours->getContenu();
    $photo = $cours->getPhoto();
    $id = $cours->getId();

    $query = "UPDATE cours SET name = :name, description = :description ,contenu =:contenu ,photo = :photo WHERE id=:id";

    $stmt = Database::getInstance()->getConnection()->prepare($query);

    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':description',$description);
    $stmt->bindParam(':contenu',$contenu);
    $stmt->bindParam(':photo',$photo);
    $stmt->bindParam(':id',$id,PDO::PARAM_INT);

    $stmt->execute();
    return $cours ; 

}

public function findAll():array{
    $query = "SELECT * FROM cours";
    $stmt = Database::getInstance()->getConnection()->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS, Cours::class);
}

public function findById(int $id):Cours{

    $query = "SELECT * FROM cours WHERE id = ". $id;

    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute();

    $cours = $stmt->fetchObject(Cours::class);
    if (!$cours){
        throw new Exception("cours with id $id not found ");

    }

    return $cours ; 
}


public function findByName()
{
    $query = "SELECT * FROM cours WHERE name = :name ";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute();

    $cours = $stmt->fetchObject(Cours::class);
    return $cours ?: null;

}




    
}

