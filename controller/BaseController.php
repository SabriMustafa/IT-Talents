<?php
namespace controller;
use model\ProductModel;
use function view\homeView as HomeView;

class BaseController{

    public function index(){

        $productModel = new ProductModel();

        $messageHandler = \Message\MessageHandler::getInstance();
        $messages = $messageHandler->getMessages();

        $categories=$productModel->getCategories();
        require_once __DIR__."/../view/Home.php";
        homeView($categories);

    }
}