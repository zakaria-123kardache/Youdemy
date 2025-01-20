<?php
namespace App\Controllers\Auth;


// require_once('./public/admin/dashbordadmin.php')


use App\Models\LoginModel;


class LoginController{


    public function login($email, $password){
        $LoginModel = new LoginModel();
        $user =  $LoginModel->findUserByEmailAndPassword($email, $password);
        if($user == null)
        {
            echo "user not found please check ...";
        }
        else{
            if($user->getRole()->getRoleName() == "Admin")
            {
                header("Location:./public/admin/dashbordadmin.php");
            }
            else if($user->getRole()->getRoleName() == "Etudiant")
            
            {
                echo 'hello';
              header("Location:./public/admin/dashbordadmin.php");
            }
            else if($user->getRole()->getRoleName() == "Enseignant")
            {
              header("Location:./public/admin/dashbordadmin.php");
            }
        }
    }
}