<?php

namespace App\Model;

use App\core\Database;
use Exception;
use PDO;

class Tagcategories
{

    protected int $id = 0;
    protected string $name = "";
    protected string $description = "";
    protected string $tablename = "tagcategorie";

    public function __construct() {}

    public function setId(int $îd): void
    {
        $this->id = $îd;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
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


    public function __toString()
    {
        return "(Tagcategories)=> id :" . $this->id . "(Tagcategories) => name :" . $this->name .
            "(Tagcategories) => description :" . $this->description;
    }

    public function create(): self
    {
        $name = $this->getName();
        $description = $this->getDescription();

        $query = "INSERT INTO $this->tablename (name, description) 
              VALUES (:name, :description)";

        $stmt = Database::getInstance()->getConnection()->prepare($query);


        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        $stmt->execute();

        $this->setId(Database::getInstance()->getConnection()->lastInsertId());

        return $this;
    }


    public function delete(int $id): int
    {
        $query = "DELETE FROM $this->tablename WHERE id =" . $id . ";";
        $stmt = Database::getINstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->rowCount();
    }


    public function update(): bool
    {
        $name = $this->getName();
        $description = $this->getDescription();
        $id = $this->getId();

        $query = "UPDATE $this->tablename SET name = :name, description = :description  WHERE id=:id";

        $stmt = Database::getInstance()->getConnection()->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // $stmt->execute();
        return $stmt->execute();
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM $this->tablename ";
        $stmt = Database::getInstance()->getConnection()->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public function findById(int $id): Cours
    {

        $query = "SELECT * FROM $this->tablename WHERE id = " . $id;

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        $tagcategorie = $stmt->fetchObject(static::class);
        if (!$$tagcategorie) {
            throw new Exception("cours with id $id not found ");
        }

        return $$tagcategorie;
    }


    public function findByName(string $name): ?self
    {
        $query = "SELECT * FROM $this->tablename WHERE name = :name ";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        $tagcategorie  = $stmt->fetchObject(static::class);
        return $tagcategorie ?: null;
    }
}
