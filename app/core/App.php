<?php

class App {
    protected $controller = "Home";
    protected $method = "index";
    protected $param = [];

    public function __construct(){
        $url = $this->pharseUrl();
        
        if(isset($url) && file_exists('app/controller/' . ucfirst($url[0]) . '.php')){
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        include 'app/controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if(!empty($url)){
            $this->param = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->param);
    }

    public function pharseUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>