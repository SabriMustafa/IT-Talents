<?php
use controller\UserController;
use controller\BaseController;
use controller\ProductController;

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        require_once __DIR__ . DIRECTORY_SEPARATOR . $class;
});


//db

session_start();

if (isset($_GET['page'])) {
//    if ($_GET['page']=="adminPage"){
//        if (isset($_SESSION) && $_SESSION["user"]["is_admin"]==1){
//            if (file_exists(__DIR__ . '\view\\'. $_GET['page'] . '.php')) {
//                require_once __DIR__ . '\view\\'. $_GET['page'] . '.php';
//
//                die;
//
//        }
//
//    }else{
//
//        require_once __DIR__.'\view\\'.'unauthrized'.'html';
//
//
//
//        }
    }
    if (file_exists(__DIR__ . '\view\\'. $_GET['page'] . '.php')) {
        require_once __DIR__ . '\view\\'. $_GET['page'] . '.php';

        die;
    }elseif (file_exists(__DIR__ . '\view\\'. $_GET['page'] . '.html')){
        require_once __DIR__.'\view\\'.$_GET['page'].'html';
    die;
  //  }
}

$FileNotFound = false;
$controllerName = isset($_REQUEST["target"]) ? $_REQUEST["target"] : "base";
$methodName = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "index";

$controllerClassName = '\\controller\\' . ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClassName)) {

    $controller = new $controllerClassName();
    if (method_exists($controller, $methodName)) {

        $controller = new $controller();
        $controller->$methodName();

//        if (!($controllerName == "user" && in_array($methodName, array("Login", "Register")))) {
//            if (!isset($_SESSION["user"])) {
//                header("HTTP/1.1 401 Unauthorized");
//                die();
//            }
//        }
//        try {
//            $success = $controller-> $methodName();
//            $messageHandler = \Message\MessageHandler::getInstance();
//            $messages = $messageHandler->getMessages();
//            $response['success'] = $success;
//            $response['messages'] = $messages;
//            echo json_encode($response, JSON_UNESCAPED_UNICODE);
//
//        } catch (Exception $e) {
//            header("HTTP/1.1 501");
//            echo $e->getMessage();
//            die();
//        }
    } else {
        $fileNotFound = true;
    }
} else {
    $fileNotFound = true;
}





if ($FileNotFound){
    echo "target or action invalid: target= ".$controllerName."and action= ".$methodName ;
}
