<?php

namespace App\Model;

use App\core\Database;
use PDO;

class Utilisateur
{

   private Int $id = 0;
   private string $firstname = "";
   private string $lastname = "";
   private string $email = "";
   private string $password = "";
   private  string $passwordConfig ;
   private string $photo = "";
   private Role $role;
   private int $role_id;

  public function __construct()
  {
   
  }

   public function getId($id)
   {
      $this->id = $id;
   }
   public function getFirstname(string $firstname): void
   {
      $this->firstname = $firstname;
   }
   public function getLastname(string $lastname): void
   {
      $this->lastname = $lastname;
   }
   public function getPhoto(string $photo): void
   {
      $this->photo = $photo;
   }
   public function getRole(Role $role): void
   {
      $this->role = $role;
   }
   public function getEmail(string $email): void
   {
      $this->email = $email;
   }
   public function getPassword(string $password): void
   {
      $this->password = $password;
   }
   public function getPasswordCOonfig(): string
   {
      return $this->passwordConfig;
   }

   public function setId(): string
   {
      return $this->id;
   }
   public function setFirstname(): string
   {
      return $this->firstname;
   }
   public function setLastname(): string
   {
      return $this->lastname;
   }
   public function setPhoto(): string
   {
      return $this->photo;
   }
   public function setEmail(): string
   {
      return $this->email;
   }
   public function setPassword(): string
   {
      return $this->password;
   }
   public function setPasswordCOonfig(string $passwordConfig): void
   {
      $this->passwordConfig = $passwordConfig;
   }
   public function setRole(): Role
   {
      return $this->role;
   }


   public function __toString()
   {
      return "(user) => id : " . $this->id . " ,(user) => firstname : " . $this->firstname . " , (user) => lastname : " . $this->lastname . " ,(user) => photo :" . $this->photo . " ,(user) => role :" . $this->role . " , (user) => email : " . $this->email . " ,(user) => password :" . $this->password;
   }

   
   public function create(Utilisateur $user): Utilisateur{
      $query = "INSERT INTO utilisateurs (firstname, lastname, email, password, photo, role_id ) VALUES ( '". $user->getFirstname() . "' , '" . $user->getLastname() . "' , '". $user->getEmail() . "' , '" . $user->getPassword() . "', '" . $user->getPhoto() . "' , '' ,". $user->getRole()->getId() .  ");" ;

      $stmt = Database::getInstance()->getConnection()->prepare($query);
      $stmt->execute();

      $user->setId(Database::getInstance()
          ->getConnection()
          ->lastInsertId());

      return $user;
  }

  public function delete(int $id) : int {
      $query = "DELETE FROM utilisateurs WHERE id = " . $id . " ;";

      $statement = Database::getInstance()->getConnection()->prepare($query);
      $statement->execute();

      return $statement->rowCount();
  }

  public function update(Utilisateur $user) : Utilisateur {
      $query = "UPDATE utilisateurs SET firstname = '" . $user->getFirstname() . "' , lastname = '" . $user->getLastname() . "' , email = '" . $user->getEmail() . "', password = '" . $user->getPassword() . "' , phone = '" . $user->getPhone() . "', photo = '" . $user->getPhoto() . "' , role_id = " . $user->getRole()->getRoleName() . " WEHRE id = ". $user->getId() . ";";
      
      $statement = Database::getInstance()->getConnection()->prepare($query);
      $statement->execute();

      return $user;
  }

  public function findAll() : array {
      $query = "SELECT * FROM utilisateurs";

      $statement = Database::getInstance()->getConnection()->prepare($query);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_CLASS, Utilisateur::class);
  }

  public function findById(int $id) : Utilisateur {
      $query = "SELECT * FROM utilisateurs WHERE id = " . $id;

      $statement = Database::getInstance()->getConnection()->prepare($query);
      $statement->execute();

      return $statement->fetchObject(Utilisateur::class);
  }


}
