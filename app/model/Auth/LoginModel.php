<?php

namespace App\Model\Auth;

use App\Model\Role;
use App\core\Database;
use App\Model\Utilisateur;
use PDO;


class LoginModel{
    private $connexion; 

    public function __construct() {
        $db = Database::getInstance();  
        $this->connexion = $db->getConnection();
    }

    public function findUserByEmailAndPassword($email, $password){
        $query = "SELECT utilisateurs.id, utilisateurs.email, utilisateurs.password, roles.id as role_id, roles.rolename as roleName
        FROM utilisateurs 
        JOIN roles ON roles.id = utilisateurs.role_id 
        WHERE utilisateurs.email = :email AND utilisateurs.password = :password";
    
        $stmt = $this->connexion->prepare($query); 
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
    
        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, "App\\Model\\Utilisateur");
        $user = $stmt->fetch();
        
        if(!$user){
            return null;
        }
        
        return $user;
    }
}