<?php

namespace App\Services;

use App\Http\LoginForm;
use App\Http\RegisterForm;
use App\Http\SignUpForm;
use App\Model\Role;
use App\Model\Utilisateur;
use App\Models\Role;
use App\Models\User;
use Exception;
use UserService;

class AuthService
{
    private UserService $userService;
    private RoleService $roleService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->roleService = new RoleService();
    }

    public function register(SignUpForm $registerForm): Utilisateur
    {
        // $this->validation($registerForm);

        $role  = Role::instanceWithName($registerForm->roleName);

        $user = Utilisateur::instanceWithoutId(
            $registerForm->firstname,
            $registerForm->lastname,
            $registerForm->email,
            $registerForm->password,
            $role,
            []
        );

        $this->userService->create($user);
        return $user;
    }

   

    public function login(LoginForm $loginForm): Utilisateur
    {
        $user = Utilisateur::instaceWithEmailAndPassword(
            $loginForm->email,
            $loginForm->password
        );

        $user =  $this->userService->findByEmailAndPassword($user);
       
        if ($user->getId() == 0) {
            throw new Exception("Email ou le mot de passe incorrect");
        }

        return $user;
    }
}