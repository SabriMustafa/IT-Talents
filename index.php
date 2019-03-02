<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . $class;
});

session_start();

$FileNotFound = false;
$controllerName = isset($_REQUEST["target"]) ? $_REQUEST["target"] : "base";
$methodName = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "index";
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
    file_put_contents(__DIR__."/application_log.txt", $e->getMessage() . "\n", FILE_APPEND);
}

