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
        return $user->login($_POST);
    }


}

