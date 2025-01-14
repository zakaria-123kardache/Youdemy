<?php
namespace App\Model;

class Utilisateur {


    private Int $id ; 
    private string $firstname ;
    private string $lastname ;
    private string $photo ; 
    private Role $role ; 
    
    
   public function __construct(){}

   public function getId($id){
    $this->id = $id ; 
   }
   public function getFirstname(string $firstname) :void {
    $this->firstname = $firstname ; 
   }
   public function getLastname(string $lastname) : void {
    $this->lastname = $lastname ; 
   }
   public function getPhoto(string $photo) : void {
    $this->photo = $photo ; 
   }
   public function getRole(string $role): void{
    $this->role = $role ; 
   }

   public function setId() :string {
    return $this-> id;
   }
   public function setFirstname() :string {
    return $this-> firstname;
   }
   public function setLastname() :string {
    return $this-> lastname;
   }
   public function setPhoto() :string {
    return $this-> photo;
   }
   public function setRole() :Role {
    return $this-> role;
   }
   

}