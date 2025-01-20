<?php
namespace App\Models;


use App\core\Database;
use Exception;


class RegisterModel {
    private $connexion;

    public function __construct() {
        $db = new Database();
        $this->connexion = $db->getConnection();
    }

    public function createUser($firstName, $lastName, $email, $password, $roleId, $skills = null, $companyName = null) {
        try {
            $this->connexion->beginTransaction();
    
            $userQuery = "INSERT INTO users (nom, prenom, email, password, role_id) 
                          VALUES (:nom, :prenom, :email, :password, :role_id)";
            $stmt = $this->connexion->prepare($userQuery);
            $stmt->bindParam(':nom', $firstName);
            $stmt->bindParam(':prenom', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role_id', $roleId);
            $stmt->execute();
    
            $userId = $this->connexion->lastInsertId();
    
            if ($roleId == 'candidate' && $skills) { 
                $candidateQuery = "INSERT INTO candidats (skills, user_id) VALUES (:skills, :user_id)";
                $stmt = $this->connexion->prepare($candidateQuery);
                $stmt->bindParam(':skills', $skills);
                $stmt->bindParam(':user_id', $userId);
                $stmt->execute();
            } if ($roleId == 'recruiter' && $companyName) { 
                $recruiterQuery = "INSERT INTO recruteurs (nom_entreprise, user_id) VALUES (:nom_entreprise, :user_id)";
                $stmt = $this->connexion->prepare($recruiterQuery);
                $stmt->bindParam(':nom_entreprise', $companyName);
                $stmt->bindParam(':user_id', $userId);
                $stmt->execute();
            }
    
            $this->connexion->commit();
            return true; // Return true for success
        } catch (Exception $e) {
            $this->connexion->rollBack();
            return $e->getMessage(); // Return the error message
        }
    }
    
}