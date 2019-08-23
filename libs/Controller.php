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
    
    /**
     * Undocumented function
     *
     * @param string $name Name of the model
     * @param string $path Location of the models
     * @return void
     */
    public function loadModel($name, $modelPath = 'models/')
    {
        $path = $modelPath . $name . '_mdl.php';

        if (file_exists($path)) {
            require $modelPath . $name . '_mdl.php';
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }
}
