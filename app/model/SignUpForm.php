<?php

class SignUpForm {

    
    public string $firstname ; 
    public string $lastname ; 
    public string $email ; 
    public string $password ; 
    public string $passwordConfirmation ; 
    public string $photo ; 
    public string $rolename ; 


    public static function instanceWithAllArgs
    (
        string $firstname , 
        string $lastname , 
        string $email , 
        string $password , 
        string $passwordConfirmation , 
        string $photo , 
        string $rolename ,
    ):self {

        $instance = new self();
        $instance->firstname = $firstname;
        $instance->lastname = $lastname;
        $instance->email = $email;
        $instance->password = $password;
        $instance->passwordConfirmation = $passwordConfirmation;
        $instance->photo = $photo;
        $instance->rolename = $rolename;

        return $instance;
        
    }
}