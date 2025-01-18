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
   private  string $passwordConfig = '';
   private string $photo = "";
   private Role $role;
   private int $role_id = 0;

   public function __construct() {}


   public static function instance(string $firstname, string $lastname, string $email, string $password , string $passwordConfig ,string $photo ,Role $role){
      $instance = new self();
      $instance->firstname = $firstname ; 
      $instance->lastname = $lastname ; 
      $instance->email = $email ; 
      $instance->password = $password ; 
      $instance->passwordConfig = $passwordConfig ; 
      $instance->photo = $photo ;
      $instance->role= $role ;   


      return $instance ; 
   }
   public static function instanceWithEmailAndPassword(string $email, string $password){
      $instance = new self();
      
      $instance->email = $email ; 
      $instance->password = $password ; 

      return $instance ; 
   }



   public function getId(): int
   {
      return $this->id;
   }

   public function getFirstname(): string
   {
      return $this->firstname;
   }

   public function getLastname(): string
   {
      return $this->lastname;
   }

   public function getPhoto(): string
   {
      return $this->photo;
   }
   public function getEmail(): string
   {
      return $this->email;
   }

   public function getPassword(): string
   {
      return $this->password;
   }

   public function getPasswordConfig(): string
   {
      return $this->passwordConfig;
   }
   public function getRole(): Role
   {
      return $this->role;
   }

   public function setId(int $id): void
   {
      $this->id = $id;
   }

   public function setFirstname(string $firstname): void
   {
      $this->firstname = $firstname;
   }

   public function setLastname(string $lastname): void
   {
      $this->lastname = $lastname;
   }

   public function setPhoto(string $photo): void
   {
      $this->photo = $photo;
   }

   public function setEmail(string $email): void
   {
      $this->email = $email;
   }

   public function setPassword(string $password): void
   {
      $this->password = $password;
   }

   public function setPasswordConfig(string $passwordConfig): void
   {
      $this->passwordConfig = $passwordConfig;
   }

   public function setRole(Role $role): void
   {
      $this->role = $role;
   }




   // public function __toString()
   // {
   //    $roleString = $this->role ? $this->role->__toString() : 'Not Set';
   //    return "(user) => id : " . $this->id .
   //       " ,(user) => firstname : " . $this->firstname .
   //       " , (user) => lastname : " . $this->lastname .
   //       " ,(user) => photo :" . $this->photo .
   //       " ,(user) => role :" . $roleString .
   //       " , (user) => email : " . $this->email .
   //       " ,(user) => password :" . $this->password;
   // }



   public function create(Utilisateur $user): Utilisateur
   {
      $query = "INSERT INTO utilisateurs (firstname, lastname, email, password, photo, role_id) VALUES ('"
         . $user->getFirstname() . "', '"
         . $user->getLastname() . "', '"
         . $user->getEmail() . "', '"
         . $user->getPassword() . "', '"
         . $user->getPhoto() . "', "
         . $user->getRole()->getId() . ");";

      $stmt = Database::getInstance()->getConnection()->prepare($query);
      $stmt->execute();

      $user->setId(Database::getInstance()->getConnection()->lastInsertId());

      return $user;
   }

   public function delete(int $id): int
   {
      $query = "DELETE FROM utilisateurs WHERE id = " . $id . " ;";

      $statement = Database::getInstance()->getConnection()->prepare($query);
      $statement->execute();

      return $statement->rowCount();
   }

   public function update(Utilisateur $user): Utilisateur
   {
      $query = "UPDATE utilisateurs SET firstname = '"
         . $user->getFirstname() . "', lastname = '"
         . $user->getLastname() . "', email = '"
         . $user->getEmail() . "', password = '"
         . $user->getPassword() . "', photo = '"
         . $user->getPhoto() . "', role_id = "
         . $user->getRole()->getId() . " WHERE id = "
         . $user->getId() . ";";

      $statement = Database::getInstance()->getConnection()->prepare($query);
      $statement->execute();

      return $user;
   }


   public function findAll(): array
   {
      $query = "SELECT * FROM utilisateurs";

      $statement = Database::getInstance()->getConnection()->prepare($query);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_CLASS, Utilisateur::class);
   }

   public static function findById(int $id): Utilisateur
   {
      $query = "SELECT * FROM utilisateurs WHERE id = " . $id;

      $statement = Database::getInstance()->getConnection()->prepare($query);
      $statement->execute();

      return $statement->fetchObject(Utilisateur::class);
   }
}
