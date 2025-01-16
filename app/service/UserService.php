<?php

use App\Model\Utilisateur;
use App\Repositories\UserRepository;
use App\Services\RoleService;

class UserService {


    private utilisateur $utilisateur;
    private UserRepository $UserRepository;
    private RoleService $roleService; 

    public function __construct()
    {
        
    }
    public function create(Utilisateur $utilisateur)
    {
        if ($utilisateur->getId() != 0) {
            throw new Exception("invalide value (id)");
        }

        if (empty($utilisateur->getFirstname())) {
            throw new Exception("Firstname is empty");
        }

        if (empty($utilisateur->getLastname())) {
            throw new Exception("lastname is empty");
        }

        if (empty($utilisateur->getEmail())) {
            throw new Exception("email is empty");
        }

        if (empty($utilisateur->getPhoto())) {
            throw new Exception("Photo is empty");
        }

        if (empty($utilisateur->getRole()->getName())) {
            throw new Exception("Role name is empty");
        }

        $roleName = $utilisateur->getRole()->getName();
        $utilisateur->setRole($this->roleService->getRoleByName($roleName));

        if ($this->checkEmailifExist($utilisateur->getEmail())) {
            throw new Exception("Email is already exist !");
        }

        return $this->userRepository->create($utilisateur);
    }

    public function checkEmailifExist(string $email)
    {
        $user = $this->userRepository->findByEmail($email);

        if ($user != null) {
            return true;
        }

        return false;
    }


    public function findByEmailAndPassword(utilisateur $user): utilisateur
    {
        $user = $this->userRepository->findByEmailAndPassword($user);

        if (!$user) {
            return new utilisateur();
        }

        $user->setRole($this->roleService->getRoleById($user->role_id));

        return $user;
    }

    public function findByEmail(string $email): utilisateur
    {
        $user = $this->userRepository->findByEmail($email);
        return $user;
    }
    
}