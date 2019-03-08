<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . $class;
});

session_start();

$FileNotFound = false;
$controllerName = isset($_GET["target"]) ? $_GET["target"] : "base";
$methodName = isset($_GET["action"]) ? $_GET["action"] : "index";
try{
    $controllerClassName = '\\controller\\' . ucfirst($controllerName) . 'Controller';

    if (class_exists($controllerClassName)) {

        $controller = new $controllerClassName();
        if (method_exists($controller, $methodName)) {

            $controller = new $controller();
            $controller->$methodName();

        } else {
            $fileNotFound = true;
        }
    } else {
        $fileNotFound = true;
    }


    if ($FileNotFound) {
        echo "target or action invalid: target= " . $controllerName . "and action= " . $methodName;
    }
}catch (Exception $e){
    date_default_timezone_set('Europe/Sofia');
    $date = date('m/d/Y h:i:s a', time());
    file_put_contents(__DIR__."/application_log.txt", $date . " " . $e->getMessage() . "\n", FILE_APPEND);
}

