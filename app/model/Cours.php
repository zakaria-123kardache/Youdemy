<?php
namespace App\Model;

class Cours {
    private int $id ; 
    private string $name ; 
    private string $description ;
    private string $photo ; 
    private string $contenu ; 
    private array $tags = [] ; 
    private Categorie $categorie ; 
    private Enseignant $enseignant ; 

    public function __construct(){}


    public function getId(int $id) : void
    {
        $this->id = $id;
    }
    public function getName(string $name) : void
    {
        $this->name = $name;
    }
    public function getDescription(string $description) : void
    {
        $this->description = $description;
    }

    public function getPhoto(string $photo) : void
    {
        $this->photo = $photo;
    }

    public function getContenu(string $contenu) : void
    {
        $this->contenu = $contenu;
    }

    public function getTags(array $tags) : void
    {
        $this->tags = $tags;
    }

    public function getCategorie(Categorie $categorie) : void
    {
        $this->categorie = $categorie;
    }


    public function getEnseignant(Enseignant $enseignant) : void
    {
        $this->enseignant = $enseignant;
    }


    public function setId() :int {
        return $this->id;
    }

    public function setName() :string {
        return $this->name;
    }

    public function setDescription() :string {
        return $this->description;
    }

    public function setPhoto() :string {
        return $this->photo;
    }

    public function setContenu() :string {
        return $this->contenu;
    }

    public function setTags() : array
    {
       return $this->tags;
    }

    public function setCategorie() : Categorie
    {
       return $this->categorie ;
    }

    public function setEnseignant() : Enseignant {
        return $this->enseignant;
    }


    public function __toString()
    {
        return "(Cour) => id : ". $this->id. ",cour name :".$this->name.
        ",cour description : ".$this->description.",cour photo : ".$this->photo.
        ",cour contenu : ".$this->contenu."cour tags". implode(", ",$this->tags)."cour categorie : ".
        $this->categorie.", cour enseignant : ".$this->enseignant ;
    }
    
}

