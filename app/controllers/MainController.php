<?php


namespace app\controllers;

use app\helpers\Uri;
use app\controllers\HomeController;
use Exception;

class MainController
{

    private string $uri;
    private array $folder = ["app\\controllers"];


    private $controller;
    private string $method;
    public function __construct()
    {
        $this->uri = Uri::getUri();
    }


    public function load()
    {
        $this->setController();
    }

    private function executeMethod(){
        $method= $this->getMethod();
        $this->controller->$method();
    }

    private function setController()
    {

        $controller = $this->formatUri();
        if(empty($controller)){
            $this->instanceController("Home");
        }
        $this->instanceController($controller);
    }
    private function formatUri()
    {
        if ($this->uri === "/") {
            return "Home";
        }
        $uri = array_values(array_filter(explode("/", $this->uri)));


        list($controller) = $uri;

        return $controller;
    }
    private function instanceController($control)
    {
        $temp = $this->verifyController($control);

        if(!$temp){
            return;
        }
        $this->controller = new $temp;

        $this->executeMethod();
    }
    private function getMethod()
    {
        try{
            if ($this->uri === "/") {
                return "index";
            }
            $uri = array_values(array_filter(explode("/", $this->uri)));
    
           
            if(!empty($uri[1])){
                list(   ,$method) = $uri;
                return $method;
            }

    
            return "index";
        }catch(Exception $err){
            echo $err->getMessage();

        }
       
    }
    private function verifyController($controller)
    {
        foreach ($this->folder as $folder) {
            if (class_exists("$folder\\$controller" ."Controller")) {
                return "$folder\\$controller" . "Controller";
            }
        }

        echo "Página não encontrada";
        return false;
    }
}
