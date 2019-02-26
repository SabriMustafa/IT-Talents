<?php
namespace controller;

use model\User;
use model\UserDao;

class UserController{
    private $userDao;
    public function __construct()
    {
        $this->userDao = new UserDao();
    }

    public function register(){
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $firstName = $_REQUEST["first_name"];
        $lastName = $_REQUEST["last_name"];
        $gendar = $_REQUEST["gendar"];
        $age = $_REQUEST["age"];

        if ($email != ''
            && $password != ''
            && strlen($password) >= "5"
            && $firstName!= ''
            && $lastName!= ''
            && $gendar!= ''
            && is_numeric( $age)){
        $user = new User( $firstName,$lastName,$email,password_hash( $password,PASSWORD_BCRYPT),$gendar,$age);
        $this->userDao->addUser($user);
        $_SESSION["user"] = $user;
        }
    }

    public function login(){

        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        if ($email != '' && $password != ''){
            $user = $this->userDao->getByEmail($email);
            if ($user != null ){
                if (password_verify($password,$user->getPassword())){
                    $_SESSION["user"] = $user;
                  require_once "view/Home.php";
                }else{
                    echo "try again!!";
                }
            }else{
                echo "try again!!";
            }
        }
    }
}