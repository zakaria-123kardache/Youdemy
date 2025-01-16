<?php
namespace App\Model;

use App\core\Database;

class Role {
    private int $id=0;
    private string $role_name="";
    private string $role_description = "";
    private string $logo = "";

    public function __construct () {}

    public static function instanceWithNameAndDescriptionAndLogo(string $name, string $description, string $logo) {
        $instance = new self();
        $instance->role_name = $name;
        $instance->role_description = $description;
        $instance->logo = $logo;

        return $instance;
    }

    public static function instanceWithName(string $name): Role {
        $instance = new self();

        $instance->role_name = $name;

        return $instance;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setRoleName(string $role_name) : void {
        $this->role_name = $role_name;
    }

    public function setDescription(string $description) : void {
        $this->role_description = $description;
    }

    public function setLogo(string $logo): void {
        $this->logo = $logo;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getRoleName() : string {
        return $this->role_name;
    }

    public function getDescription(): string {
        return $this->role_description;
    }

    public function getLogo(): string {
        return $this->logo;
    }

    // public function __toString() {
    //     $id = $this->id ?? 0;
    //     $name = $this->role_name ?? "";
    //     $description = $this->role_description ?? "";
    //     $logo = $this->logo ?? "";

    //     return "(Role) => id : " . $id . " , name : " . $name . " , description : " . $description . " , logo : " . $logo;
    // }


    public function create(Role $role):Role
    {
       $query = "INSERT INTO utilisateurs (firstname, lastname, email, password, photo, role_id) VALUES ('"
          . $role->getRoleName() . "', '"
          . $role->getDescription() . "', '"
          . $role->getLogo() . ");";
          
 
       $stmt = Database::getInstance()->getConnection()->prepare($query);
       $stmt->execute();
 
       $role->setId(Database::getInstance()->getConnection()->lastInsertId());
 
       return $role;
    }
    

    public function delete (int $id ):int  
    {
        $query = "DELETE FROM roles WHERE id = ".$id.";";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->rowCount();
    }


         

    }