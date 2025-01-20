<?php 
namespace App\Controllers\Auth;

use App\Model\Auth\RegisterModel;

class RegisterController {
    public function register($postData) {
        $firstname = $postData['firstname'];
        $lastname = $postData['lastname'];
        $email = $postData['email'];
        $password = $postData['password'];
        
        // Check if role key exists in postData
        if (!isset($postData['role'])) {
            echo "Role is required.";
            return;
        }

        $roleId = $postData['role']; // Changed from role_id to role to match form
        
        // Validate role ID
        if (!in_array($roleId, [2, 3])) { // Only allow role IDs 2 and 3
            echo "Invalid role selected.";
            return;
        }

        $registerModel = new RegisterModel();
        $result = $registerModel->create($firstname, $lastname, $email, $password, $roleId);

        if ($result === true) {
            header('location: ../../public/auth/login.php');
        } else {
            echo "Registration failed: " . $result;
        }
    }
}