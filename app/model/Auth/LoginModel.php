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

    public function findUserByEmailAndPassword($email, $password) {
        $query = "SELECT utilisateurs.id, utilisateurs.email, utilisateurs.password, 
                         roles.id AS role_id, COALESCE(roles.rolename, 'Etudiant') AS role
                  FROM utilisateurs 
                  JOIN roles ON roles.id = utilisateurs.role_id 
                  WHERE utilisateurs.email = :email";
    
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":email", $email);
    
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        } else {
            $roleName = $row["role"] ?? 'Etudiant'; // Default if null
            $role = new Role($row["role_id"], $roleName);
            return new Utilisateur($row['id'], $row["email"], $role, $row["password"]);
        }
    }
    
}