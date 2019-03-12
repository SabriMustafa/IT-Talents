<?php

namespace Validator;

use model\User;
use Message\MessageHandler;
use model\UserDao;

class UserValidator
{
    public function validateRegisterUserData(array $data)
    {
        $messageHandler = MessageHandler::getInstance();
        $userDao = new UserDao();
        $user = $userDao;


        if (!isset($data['email']) || $data['email'] == "" ||
            !isset($data['password']) || $data['password'] == "" ||
            strlen($data['password']) < 5 ||
            !isset($data['first_name']) || $data['first_name'] == "" || strlen($data['first_name'])>100 ||
            !isset($data['last_name']) || $data['last_name'] == "" ||  strlen($data['last_name'])>100 ||
            !isset($data['gender']) || $data['gender'] == "" || strlen($data['gender'])>100 ||
            !isset($data['age']) || $data['age'] == "" ||
            !is_numeric($data['age']) || $data['age']<5 || $data['age']>150
        ) {


            $messageHandler->addMessage('Проблем с подадените параметри!', MessageHandler::MESSAGE_TYPE_ERROR);
            return false;
        } elseif ($user->getByEmail($data['email'])) {


            $messageHandler->addMessage("Потребителят вече съществува ", MessageHandler::MESSAGE_TYPE_ERROR);
            return false;
        } else {
            if ($data["password"] != $data["password2"]) {

                $messageHandler->addMessage("Паролите не съвпадат ", MessageHandler::MESSAGE_TYPE_ERROR);
                return false;
            }

            return true;
        }

    }

    public function validateEditProfileData($data)
    {
        $messageHandler = MessageHandler::getInstance();
        if (!isset($data['first_name']) || $data['first_name'] == "" || strlen($data['first_name'])>100 ||
            !isset($data['last_name']) || $data['last_name'] == "" || strlen($data['last_name'])>100 ||
            !isset($data['gender']) || $data['gender'] == "" || strlen($data['gender'])>100 ||
            !isset($data['age']) || $data['age'] == "" || $data['age']<5 || $data['age']>150 ||
            !is_numeric($data['age'])
        ) {
            $messageHandler->addMessage('Проблем с подадените параметри!', MessageHandler::MESSAGE_TYPE_ERROR);
            return false;
        }
        if (isset($data['new-password']) && isset($data['repeat-password']) && $data['new-password'] !== '' || $data['repeat-password'] !== '') {
            if (($data['new-password'] !== $data['repeat-password']) ||  strlen($data['new-password']) < 5) {
                $messageHandler->addMessage('Паролата ви не отговаря на изискванията!', MessageHandler::MESSAGE_TYPE_ERROR);
                return false;
            }
        }
        return true;
    }

    public function validateLoginUserData(array $data)
    {
        $messageHandler = MessageHandler::getInstance();
        $email = trim($data["email"]);
        $password =trim( $data["password"]);
        if (isset($email) &&
            $email != '' &&
            isset($password) && $password != '') {

            $userDao = new UserDao();
            $user = $userDao->getByEmail($email);
            if ($user) {
                if (password_verify($password, $user->getPassword())) {
                    $messageHandler->addMessage(sprintf('%s, вие се логнахте успешно!', $user->getFirstName()), MessageHandler::MESSAGE_TYPE_SUCCESS);
                    return true;
                } else {
                    $messageHandler->addMessage('Грешна парола!', MessageHandler::MESSAGE_TYPE_ERROR);
                    return false;
                }
            } else {
                $messageHandler->addMessage('Потребителят не съществува!', MessageHandler::MESSAGE_TYPE_ERROR);
                return false;
            }
        } else {
            $messageHandler->addMessage('Проблем с подадените параметри!', MessageHandler::MESSAGE_TYPE_ERROR);
            return false;
        }

    }


}