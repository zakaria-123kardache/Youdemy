<?php
namespace App\Controllers\Auth;

use App\Models\RegisterModel;

class RegisterController {
    public function register($postData) {
        
        $firstName = $postData['nom'];
        $lastName = $postData['prenom'];
        $email = $postData['email'];
        $password = password_hash($postData['password'], PASSWORD_BCRYPT);
        $roleId = $postData['role_id'] === "candidate" ? 1 : ($postData['role_id'] === "recruiter" ? 2 : null);
        $skills = isset($postData['skills']) ? $postData['skills'] : null;
        $companyName = isset($postData['company_name']) ? $postData['company_name'] : null;

        if (!$roleId) {
            echo "Invalid role selected.";
            return;
        }

        $registerModel = new RegisterModel();
        $result = $registerModel->createUser($firstName, $lastName, $email, $password, $roleId, $skills, $companyName);

        if ($result === true) {
            header('location: login.php');
        } else {
            echo "Registration failed: " . $result;
        }
    }
}