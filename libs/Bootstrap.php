<?php

class Bootstrap
{
    public function __construct()
    {
        if(isset($_GET["url"]))
        {
            $url = $_GET["url"];
            
            if($url == "index.php")
            {
                $url = "index";
                require 'controllers/index.php';
                $controller = new Index();
                $controller->index();
                return false;
            }
        }

        //trim the slash
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/',$url);

        $file = 'controllers/'.$url[0].'.php';
        if(file_exists($file))
        {
            require $file;
        } else {
            $this->error();
            return false;
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        if(isset($url[2]))
        {
            $controller->{$url[1]} ($url[2]);
        } else {
            if(isset($url[1]))
            {
                if(method_exists($controller, $url[1]))
                {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            } else {
                $controller->index();
            }
        }
    }

    private function error()
    {
        require 'controllers/error_.php';
        $error = new Error_();
        $error->index();
        return false;
    }
}
