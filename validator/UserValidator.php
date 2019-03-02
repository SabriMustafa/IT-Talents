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
            $user = $userDao;

            if ($user->getByEmail($email)) {

var_dump($user);
                if (password_verify($password, $user->password)) {


                    return true;
                } else {
                    echo "try again!!";
                    return false;
                }
            } else {
                return false;
                echo "try again!!";
            }
        } else {
            return false;
        }

    }


}