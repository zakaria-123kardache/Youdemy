<?php

namespace App\Model;

use App\core\Database;
use PDO;

class Role
{
    private int $id = 0;
    private string $rolename = "";
    private string $roledescription = "";
    private string $rolelogo = "";

    public function __construct() {}

    public static function instanceWithNameAndDescriptionAndLogo(string $rolename, string $roledescription, string $rolelogo)
    {
        $instance = new self();
        $instance->rolename = $rolename;
        $instance->roledescription = $roledescription;
        $instance->rolelogo = $rolelogo;

        return $instance;
    }

    public static function instanceWithName(string $name): Role
    {
        $instance = new self();

        $instance->rolename = $name;

        return $instance;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setRoleName(string $role_name): void
    {
        $this->rolename = $role_name;
    }

    public function setDescription(string $description): void
    {
        $this->roledescription = $description;
    }

    public function setLogo(string $logo): void
    {
        $this->rolelogo = $logo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRoleName(): string
    {
        return $this->rolename;
    }

    public function getDescription(): string
    {
        return $this->roledescription;
    }

    public function getLogo(): string
    {
        return $this->rolelogo;
    }

    // public function __toString() {
    //     $id = $this->id ?? 0;
    //     $name = $this->role_name ?? "";
    //     $description = $this->role_description ?? "";
    //     $logo = $this->logo ?? "";

    //     return "(Role) => id : " . $id . " , name : " . $name . " , description : " . $description . " , logo : " . $logo;
    // }


    public function create(Role $role): Role

    {
        $query = "INSERT INTO roles (rolename, roledescription, rolelogo) VALUES ('"
            . $role->getRoleName() . "', '"
            . $role->getDescription() . "', '"
            . $role->getLogo() . "');";


        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        $role->setId(Database::getInstance()->getConnection()->lastInsertId());

        return $role;
    }


    public function delete(int $id): int
    {
        $query = "DELETE FROM roles WHERE id = " . $id . ";";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function update (Role $role):Role
    {
        $query = "UPDATE roles SET rolename = '"
        .$role->getRoleName() ."', roledescription ='"
        .$role->getDescription()."', rolelogo ='"
        .$role->getLogo(). ";";

        $statement = Database::getInstance()->getConnection()->prepare($query);
        $statement->execute();
  
        return $role;
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM roles";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Role::class); // Fix: Use Role::class instead of Utilisateur::class
    }

    

    public function findById(int $id): Role
    {
        $query = "SELECT * FROM roles WHERE id = " . $id;
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->fetchObject(Role::class);
    }

    public function findByName(){
        $query = "SELECT * FROM roles WHERE rolename = :rolename";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(":rolename", $name);
        $stmt->execute();

        $role = $stmt->fetchObject(Role::class);
        return $role ?:null ;
    }
}
