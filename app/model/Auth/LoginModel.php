<?php
namespace App\Model\Auth;

use App\core\Database;
use App\Model\Utilisateur;
use PDO;

class LoginModel {
    private $connexion; 

    public function __construct() {
        $db = Database::getInstance(); 
        $this->connexion = $db->getConnection();
    }

    public function findUserByEmailAndPassword($email, $password) {
        $query = "SELECT 
            u.id,
            u.email,
            u.password,
            r.id as role_id,
            r.rolename as roleName
        FROM utilisateurs u
        JOIN roles r ON r.id = u.role_id 
        WHERE u.email = :email AND u.password = :password";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        

        $stmt->setFetchMode(PDO::FETCH_CLASS, Utilisateur::class);
        $user = $stmt->fetch();
        
        if (!$user) {
            return null;
        }

        return $user;
    }
}