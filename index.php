<?php
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . $class;
});


//db


session_start();

$FileNotFound = false;
$controllerName = isset($_REQUEST["target"]) ? $_REQUEST["target"] : "base";
$methodName = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "index";

$controllerClassName = '\\controller\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClassName)) {
    $controller = new $controllerClassName();
    if (method_exists($controller, $methodName)) {
        if (!($controllerName == "user" && in_array($methodName, array("login", "register")))) {
            if (!isset($_SESSION["user"])) {
                header("HTTP/1.1 401 Unauthorized");
                die();
            }
        }
        try {
            $controller-> $methodName();
        } catch (Exception $e) {
            header("HTTP/1.1 501");
            echo $e->getMessage();
            die();
        }
    } else {
        $fileNotFound = true;
    }
} else {
    $fileNotFound = true;
}

if ($FileNotFound){
    echo "target or action invalid: target= ".$controllerName."and action= ".$methodName ;
}
