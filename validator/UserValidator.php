<?php

namespace Validator;

use model\User;
use Message\MessageHandler;
use model\UserDao;

class UserValidator
{
    public function validateRegisterUserData(array $data)
    {

        $userDao = new UserDao();
        $user = $userDao;

        if (!isset($data['email']) ||
            !isset($data['password']) ||
            !strlen($data['password']) >= 5 ||
            !isset($data['first_name']) ||
            !isset($data['last_name']) ||
            !isset($data['gender']) ||
            !isset($data['age']) ||
            !is_numeric($data['age'])
        ) {

            $messageHandler = MessageHandler::getInstance();
            $messageHandler->addMessage('Проблем с подадените параметри!', MessageHandler::MESSAGE_TYPE_ERROR);
            return false;
        } elseif ($user->getByEmail($data['email'])) {
            var_dump($user);
            echo "\"Потребителят вече съществува \"";
            $messageHandler = MessageHandler::getInstance();
            $messageHandler->addMessage("Потребителят вече съществува ", MessageHandler::MESSAGE_TYPE_ERROR);
            return false;
        } else {
            if ($data["password"]!=$data["password2"]){
                return false;
            }

            return true;
        }

    }

    public function validateEditProfileData($data)
    {
        if (!isset($data['email']) ||
            !isset($data['password']) ||
            !strlen($data['password']) >= 5 ||
            !isset($data['first_name']) ||
            !isset($data['last_name']) ||
            !isset($data['gender']) ||
            !isset($data['age']) ||
            !is_numeric($data['age'])
        ) {

            $messageHandler = MessageHandler::getInstance();
            $messageHandler->addMessage('Проблем с подадените параметри!', MessageHandler::MESSAGE_TYPE_ERROR);
            return false;


        } else {

            return true;
        }


    }

    public function validateLoginUserData(array $data)
    {
        $email = $data["email"];
        $password = $data["password"];
        if (isset($email) &&
            $email != '' &&
            isset($password) && $password != '') {

            $userDao = new UserDao();
            $user = $userDao->getByEmail($email);
            if ($user) {
                if (password_verify($password, $user->getPassword())) {
                    return true;
                } else {
                    echo "try again!!";
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }

    }


}