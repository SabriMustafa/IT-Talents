<?php
namespace controller;


class BaseController{

    public  function index(){

        $productController = new ProductController();

        $messageHandler = \Message\MessageHandler::getInstance();
        $messages = $messageHandler->getMessages();
        $categories=$productController->getCategories();

        include __DIR__."/../view/Home.php";
    }
}