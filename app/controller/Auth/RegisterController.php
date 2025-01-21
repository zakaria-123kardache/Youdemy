<?php 
namespace App\Controllers\Auth;

use App\Model\Auth\RegisterModel;

class RegisterController {
    public function register($postData) {
        $firstname = $postData['firstname'];
        $lastname = $postData['lastname'];
        $email = $postData['email'];
        $password = $postData['password'];
        
       
        if (!isset($postData['role'])) {
            echo "Role is required.";
            return;
        }

        $roleId = $postData['role']; 
        
  
        if (!in_array($roleId, [2, 3])) {
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