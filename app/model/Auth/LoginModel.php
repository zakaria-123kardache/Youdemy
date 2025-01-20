<?php

namespace App\Models;

use App\Model\Role;
use App\core\Database;
use App\Model\Utilisateur;
use PDO;


class LoginModel{
    private $connexion; 

    public function __construct() {
            $db = new Database();
            $this->connexion = $db->getConnection();
    }

    public function findUserByEmailAndPassword($email, $password){

        $query = "SELECT utilisateurs.id, utilisateurs.email, utilisateurs.password, roles.id as roleid, roles.rolename as `role`
        FROM utilisateurs 
        JOIN roles ON roles.id = utilisateurs.role_id 
        WHERE utilisateurs.email = :email";

        $stmt = $this->connexion->prepare($query); 
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);

        $stmt->execute();
        
         $row = $stmt->fetch(PDO::FETCH_CLASS);
         if(!$row){
         return null;
         }
         else{
            $role = new Role($row["role_id"], $row["role"]);
            return new Utilisateur($row['id'],$row["email"],$role,$row["password"]);
         }
    }
}