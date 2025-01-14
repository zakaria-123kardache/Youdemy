<?php
namespace App\Model;

class Utilisateur {


    private Int $id ; 
    private string $firstname ="" ;
    private string $lastname ="" ;
    private string $photo ="" ; 
    private Role $role  ; 
    
    
   public function __construct(){
    
      $this->role = new Role();
   }

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
   public function getRole(Role $role): void{
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


   public function __toString()
   {
        return "(user) => id : ".$this->id." ,(user) => firstname : ".$this->firstname." , (user) => lastname : ".$this->lastname." ,(user) => photo :".$this->photo." ,(user) => role :".$this->role ;
}

}