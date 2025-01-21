<?php
namespace App\Model\Auth; 

use App\Core\Database;
use Exception;


class RegisterModel {
    private $connexion;

    public function __construct() {
       
        $db = Database::getInstance();
        $this->connexion = $db->getConnection();
    }

    public function create($firstname, $lastname, $email, $password, $roleId) {
        try {
            $this->connexion->beginTransaction();
    
            $query = "INSERT INTO utilisateurs (firstname, lastname, email, password, role_id) 
                          VALUES (:firstname, :firstname, :email, :password, :role_id)";
            $stmt = $this->connexion->prepare($query);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role_id', $roleId);
            $stmt->execute();
    
            $userId = $this->connexion->lastInsertId();
    
         
            $this->connexion->commit();
            return true; 
        } catch (Exception $e) {
            $this->connexion->rollBack();
            return $e->getMessage(); 
        }
    }
    
}