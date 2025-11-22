<?php

class App {

    protected $controller = 'HomeController';
    protected $method = 'index';                
    protected $params = [];                     

    public function __construct()
    {
        $url = $this->parseURL();
        // CONTROLLER
        if (isset($url[0])) {
            $possibleController = ucfirst($url[0]) . "Controller";
            if (file_exists("../app/controllers/" . $possibleController . ".php")) {
                $this->controller = $possibleController;
                unset($url[0]);
            }
        }

        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // METHOD
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        $this->params = !empty($url) ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    
    // PARSE URL
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode("/", $url);
        }
        return [];
    }
}

?>