<?php

class SignInForm
{

    public string $email;
    public string $password;

    public static function instanceWithAllArgs(string $email , string $password)
    {
        $instance = new self ();
        $instance->email = $email; 
        $instance->password = $password;
        
        return $instance ; 
    } 
}
