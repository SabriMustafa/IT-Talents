<?php

namespace model;

use Message\MessageHandler;
use Validator\UserValidator;

class UserModel extends JsonObject {



    public function register(array $data)
    {
        $validator = new UserValidator();
        if (! $validator->validateRegisterUserData($data)) {
            echo "hahah";
            return false;
        }

        $user = new User();
        $user->setEmail($data['email']);
        $user->setPassword(password_hash($data['password'],PASSWORD_BCRYPT));
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setGender($data['gender']);
        $user->setAge($data['age']);

        $userDao = new UserDao();
        $userDao->addUser($user);
        $_SESSION['user'] = $user;
        $messageHandler = MessageHandler::getInstance();
        $messageHandler->addMessage(sprintf('%s, вие се регистрирахте успешно!', $user->getFirstName()), MessageHandler::MESSAGE_TYPE_SUCCESS);
        return true;
    }
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

}


