<?php
namespace App\Http;


class SignUpForm {

    public string $firstname ; 
    public string $lastname ; 
    public string $email ; 
    public string $password ; 
    public string $confirmpassword ;
     


    public static function instanceWithAllArgs(string $lastname, string $firstname, string $email, string $password, string $confirmpassword ):self
    {
        $instance = new self();
        $instance->lastname = $lastname;  
        $instance->firstname = $firstname;  
        $instance->email = $email;  
        $instance->password = $password;  
        $instance->confirmpassword = $confirmpassword;
        
        return $instance ; 
    }
    
}