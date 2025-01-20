<?php

namespace App\Model;

use App\core\Database;
use Exception;
use PDO;

class Cours
{
    private int $id = 0;
    private string $name = '';
    private string $description = '';
    private string $photo = '';
    private string $contenu = '';
    private array $tags = [];
    private Categorie $categorie;
    private Enseignant $enseignant;



    public function __construct() {}

    public function instance(string $description, string $name, string $photo, string $contenu, array $tags, Categorie $categorie, enseignant $enseignant)
    {
        $instance = new self();
        $instance->name = $name;
        $instance->description = $description;
        $instance->photo = $photo;
        $instance->contenu = $contenu;
        $instance->tags = $tags;
        $instance->categorie = $categorie;
        $instance->enseignant = $enseignant;

        return $instance;
    }


    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getCategorie(): Categorie
    {
        return $this->categorie;
    }


    public function getEnseignant(): Enseignant
    {
        return $this->enseignant;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function setCategorie(Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function setEnseignant(Enseignant $enseignant): void
    {
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

        $name = $cour->getName();
        $description = $cour->getDescription();
        $contenu = $cour->getContenu();
        $photo = $cour->getPhoto();
        $categorieId = $cour->getCategorie()->getId();

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':categorie_id', $categorieId, PDO::PARAM_INT);

        $stmt->execute();

        $cour->setId(Database::getInstance()->getConnection()->lastInsertId());

        return $cour;
    }




    public function delete(int $id): int
    {
        $query = "DELETE FROM cours WHERE id =" . $id . ";";
        $stmt = Database::getINstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->rowCount();
    }


    public function update(Cours $cours): Cours
    {
        $name = $cours->getName();
        $description = $cours->getDescription();
        $contenu = $cours->getContenu();
        $photo = $cours->getPhoto();
        $id = $cours->getId();
        $categorieId = $cours->getCategorie()->getId();

        $query = "UPDATE cours SET name = :name, description = :description, contenu = :contenu, photo = :photo, categorie_id = :categorie_id WHERE id = :id";

        $stmt = Database::getInstance()->getConnection()->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':categorie_id', $categorieId, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $cours;
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM cours";
        $stmt = Database::getInstance()->getConnection()->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Cours::class);
    }

    public function findById(int $id): Cours
    {

        $query = "SELECT * FROM cours WHERE id = " . $id;

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        $cours = $stmt->fetchObject(Cours::class);
        if (!$cours) {
            throw new Exception("cours with id $id not found ");
        }

        return $cours;
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
