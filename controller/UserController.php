<?php

namespace controller;

use message\MessageHandler;
use model\UserDao;
use model\UserModel;
use Validator\UserValidator;
use model\User;

class UserController
{
    public function register()
    {

        $validator = new UserValidator();
        if (!$validator->validateRegisterUserData($_POST)) {

            return false;
        }

        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $user->setFirstName($_POST['first_name']);
        $user->setLastName($_POST['last_name']);
        $user->setGender($_POST['gender']);
        $user->setAge($_POST['age']);
        $user->setIsAdmin(0);

        $userDao = new UserDao();
        $userDao->addUser($user);
        $user = $userDao->getByEmail($_POST['email']);
        $_SESSION['user'] = $user;
        $messageHandler = MessageHandler::getInstance();
        $messageHandler->addMessage(sprintf('%s, вие се регистрирахте успешно!', $user->getFirstName()), MessageHandler::MESSAGE_TYPE_SUCCESS);
        header("location: index.php");
    }

    public function login()
    {
        $messageHandler = MessageHandler::getInstance();

        $validator = new UserValidator();
        if (!$validator->validateLoginUserData($_POST)) {
            $messageHandler->addMessage(sprintf('Грешни креденшъли!'), MessageHandler::MESSAGE_TYPE_SUCCESS);
            echo "Грешни креденшъли!";
            return false;
        }


        $userDao = new UserDao();
        $user = $userDao->getByEmail($_POST["email"]);

        $_SESSION["user"] = $user;


        $messageHandler->addMessage(sprintf('%s, вие се логнахте успешно!', $user->getFirstName()), MessageHandler::MESSAGE_TYPE_SUCCESS);
        header("location: index.php ");
    }

    public function editProfile()
    {
        $messageHandler = MessageHandler::getInstance();
        $validator = new UserValidator();
        if ($validator->validateEditProfileData($_POST)) {
            $user = new User();

            if ($_POST['new-password'] === '' && $_POST['repeat-password'] === '') {
                $user->setPassword($_SESSION['user']->getPassword());
            } else {
                $user->setPassword(password_hash($_POST['new-password'], PASSWORD_BCRYPT));
            }
            $user->setEmail($_SESSION['user']->getEmail());
            $user->setFirstName($_POST['first_name']);
            $user->setLastName($_POST['last_name']);
            $user->setGender($_POST['gender']);
            $user->setAge($_POST['age']);
            $user->setIsAdmin($_SESSION['user']->getIsAdmin());
            $userDao = new UserDao();
            $userDao->updateData($user);
            $_SESSION['user'] = $user;

            $messageHandler->addMessage('Успешно редактирахте профила си!');
        }

        foreach ($messageHandler->getMessages() as $message) {
            if ($message['type'] === MessageHandler::MESSAGE_TYPE_ERROR) {
                $this->editProfileView();
                return;
            }
        }

        $this->getProfileData();
    }

    public function getProfileData()
    {
        $id = $_SESSION["user"]->getId();

        $userDao = new UserDao();
        $orders = $userDao->getAllOrders($id);
        $favourites = $userDao->getFavourites($id);


        require_once __DIR__ . '/../view/profile.php';

    }


    public function addToFavourites()
    {
        $body = file_get_contents("php://input");
        $param = json_decode($body, true);

        $action = "";
        if (isset($param['action'])) {
            $action = trim($param['action']);

        }

        if ($action == "add") {
            $productId = $param["productId"];
            $userDao = new UserDao();
            $likeResult = $userDao->insertIntoFavourites($productId);
            echo $likeResult;
        } elseif ($action == "remove") {
            $productId = $param["productId"];
            $userDao = new UserDao();
            $removeResult = $userDao->removeFromFavourites($productId);
            echo $removeResult;
        } else {
            echo json_encode(["success" => false, "msg" => "unsupported action!"]);
        }
    }


    public function loginView()
    {
        require_once __DIR__ . '/../view/login.php';
    }

    public function registerView()
    {
        require_once __DIR__ . '/../view/register.php';
    }

    public function editProfileView()
    {
        if (! isset($_SESSION['user'])) {
            header('location:index.php');
        }
        $userDao = new UserDao();
        $userData = $userDao->getByEmail($_SESSION['user']->getEmail());
        if ($userData === null) {
            $messageHandler = MessageHandler::getInstance();
            $messageHandler->addMessage('Не е открит потребител с емайл' . $_SESSION['user']->getEmail(), MessageHandler::MESSAGE_TYPE_ERROR);
        }
        require_once __DIR__ . '/../view/editProfile.php';
        return;
    }

    public function profileView()
    {
        if (! isset($_SESSION['user'])) {
            header('location:index.php');
        }
        require_once __DIR__ . '/../view/profile.php';
    }

    public function exitProfile()
    {
        session_destroy();
        require_once __DIR__ . '/../view/login.php';
    }
}
