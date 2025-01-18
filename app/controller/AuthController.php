<?php

use App\Model\Role;
use App\Model\Utilisateur;

class AuthController {

    public function SignUp (){

        $signupform = SignUpForm::instanceWithAllArgs(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['email'],
            $_POST['password'],
            $_POST['passwordConfirmation'],
            $_POST['photo'],
            $_POST['rolename']
        );

        if($signupform->password !== $signupform->passwordConfirmation){
            echo " password nt corrected";
            return;
        }

        $role = Role::instanceWithNameAndDescriptionAndLogo(
            $signupform->rolename,
            "admmiin",  
            "path/to/logo.png"      
        );

        $utilisateur = Utilisateur::instance(
            $signupform->firstname,
            $signupform->lastname,
            $signupform->email,
            $signupform->password,
            $signupform->passwordConfirmation,
            $signupform->photo,
            $role
        );

        $utilisateur = $utilisateur->create($utilisateur);

        $_SESSION['user'] = $utilisateur;
        exit();




    }
}