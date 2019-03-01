<?php
namespace controller;

use model\UserModel;

class UserController
{
    public function register()
    {
        $user = new UserModel();
        return $user->register($_POST);
    }

    public function login(){
        $user= new UserModel();
        require_once __DIR__ . '\..\view\adminPage.php';
        return $user->login($_POST);
    }

    public function loginView()
    {
        require_once __DIR__ . '\..\view\Login.html';
    }

}

