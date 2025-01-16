<?php

namespace App\Controllers;

use App\Http\LoginForm;
use App\Http\RegisterForm;
use App\Http\SignUpForm;
use App\Services\AuthService;
use Exception;

class AuthController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function register(SignUpForm $signUpForm)
    {
        try {
            $user = $this->authService->register($signUpForm);


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function login(LoginForm $loginForm)
    {
       
    }

}