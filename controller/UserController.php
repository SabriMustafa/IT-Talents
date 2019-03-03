<?php
namespace controller;
use message\MessageHandler;
use model\UserDao;
use Validator\UserValidator;
use model\User;
class UserController
{
    public function register()
    {

        $validator = new UserValidator();
        if ( !$validator->validateRegisterUserData($_POST)) {

            return false;
        }

        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword(password_hash($_POST['password'],PASSWORD_BCRYPT));
        $user->setFirstName($_POST['first_name']);
        $user->setLastName($_POST['last_name']);
        $user->setGender($_POST['gender']);
        $user->setAge($_POST['age']);

        $userDao = new UserDao();
        $userDao->addUser($user);
        $_SESSION['user'] = $user;
        $messageHandler = MessageHandler::getInstance();
        $messageHandler->addMessage(sprintf('%s, вие се регистрирахте успешно!', $user->getFirstName()), MessageHandler::MESSAGE_TYPE_SUCCESS);
        return true;
    }

    public function login(){
        $messageHandler = MessageHandler::getInstance();

        $validator=new UserValidator();
        if (!$validator->validateLoginUserData($_POST)){
            $messageHandler->addMessage(sprintf('Грешни креденшъли!'), MessageHandler::MESSAGE_TYPE_SUCCESS);
            echo "Грешни креденшъли!";
            return false;
        }


        $userDao= new UserDao();
        $user=$userDao->getByEmail($_POST["email"]);

        $_SESSION["user"]=$user;


        $messageHandler->addMessage(sprintf('%s, вие се логнахте успешно!', $user->getFirstName()), MessageHandler::MESSAGE_TYPE_SUCCESS);
        return true;
    }

    public function editProfile(){
        $validator=new UserValidator();
        if ($validator->validateEditProfileData($_POST)){
           $user=new User();
            $user->setEmail($_POST['email']);
            $user->setPassword(password_hash($_POST['password'],PASSWORD_BCRYPT));
            $user->setFirstName($_POST['first_name']);
            $user->setLastName($_POST['last_name']);
            $user->setGender($_POST['gender']);
            $user->setAge($_POST['age']);

            $userDao = new UserDao();
            $userDao->updateData($user);
        }



    }




    public function loginView()
    {
        require_once __DIR__ . '\..\view\login.php';
    }

    public function registerView(){
        require_once __DIR__ . '\..\view\register.php';
    }

    public function editProfileView(){
        require_once __DIR__ . '\..\view\editProfile.php';
    }


}

