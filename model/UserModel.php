<?php

namespace model;

use Message\MessageHandler;
use Validator\UserValidator;

class UserModel extends JsonObject
{
    public function login(array $data)
    {
        $messageHandler = MessageHandler::getInstance();

        $validator=new UserValidator();
        if (!$validator->validateLoginUserData($data)){
            $messageHandler->addMessage(sprintf('Грешни креденшъли!'), MessageHandler::MESSAGE_TYPE_SUCCESS);
            var_dump($validator);
            return false;
        }


        $userDao= new UserDao();
        $user=$userDao->getByEmail($data["email"]);

        $_SESSION["user"]=$user;


        $messageHandler->addMessage(sprintf('%s, вие се логнахте успешно!', $user->getFirstName()), MessageHandler::MESSAGE_TYPE_SUCCESS);
        return true;
    }

    public function getUserDataByEmail($userId)
    {
        $userDao= new UserDao();
        return $userDao->getById($userId);
    }
}


