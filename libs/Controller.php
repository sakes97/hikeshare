<?php

class Controller
{
    public function __construct()
    {
        /*
         instance of the view class -
         view class is responsible for
         the rendering of views
         this instance is going to be referenced
         in our base controllers
         */
        $this->view = new View();
    }

    public function loadModel($name)
    {
        $path = 'models/' . $name . '_mdl.php';

        if (file_exists($path)) {
            require 'models/' . $name . '_mdl.php';
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }
}
