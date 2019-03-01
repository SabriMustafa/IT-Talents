<?php

namespace Validator;

use model\User;
use Message\MessageHandler;
use model\UserDao;

class UserValidator
{
    public function validateRegisterUserData(array $data)
    {
        $userDao=new UserDao();
        $user=$userDao;
        if (! isset($data['email']) ||
            ! isset($data['password']) ||
            ! strlen($data['password']) >= 5 ||
            ! isset($data['first_name']) ||
            ! isset($data['last_name']) ||
            ! isset($data['gender']) ||
            ! isset($data['age']) ||
            ! is_numeric($data['age'])
        ){
            $messageHandler = MessageHandler::getInstance();
            $messageHandler->addMessage('Проблем с подадените параметри!', MessageHandler::MESSAGE_TYPE_ERROR);
            return false;
        }elseif (!$user->getByEmail($data['email']==null)){


            $messageHandler=MessageHandler::getInstance();
            $messageHandler->addMessage("Потребителят вече съществува ",MessageHandler::MESSAGE_TYPE_ERROR);
            return false;
        }
        return true;
    }

    public function validateLoginUserData(array $data)
    {
        $email = $data["email"];
        $password = $data["password"];
        if (isset($email)&&
            $email != '' &&
            isset($password) && $password != ''){
            $userDao=new UserDao();
            $user=$userDao->getByEmail($email);

            if ($user != null ){
                if (password_verify($password,$user->getPassword())){

                  //  $_SESSION["user"] = $user;
                   // require_once "view/Home.php";
                    return true;
                }else{
                   // echo "try again!!";
                    return false;
                }
            }else{
                return false;
                //echo "try again!!";
            }
        }else{
            return false;
        }

    }



}