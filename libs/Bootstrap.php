<?php

class Bootstrap
{
    private $_url = null;
	private $_controller = null;

    public function __construct()
    {
        $this->_getURL();

        if ($this->_url[0] == "index.php") {
            $this->_url = "index";
            // print_r($this->_url);
            $this->_loadDefaultController();
            return false;
        }

        $this->_loadExistingController();

        $this->_callControllerMethod();
    }

    private function _getURL()
    {
        if (isset($_GET["url"])) {
            $this->_url = $_GET["url"];
        }
        $this->_url = rtrim($this->_url, '/');
        $this->_url = filter_var($this->_url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $this->_url);
    }

    private function _loadDefaultController()
    {
        require 'controllers/index.php';
        $this->_controller = new Index();
        $this->_controller->index();
    }

    private function _loadExistingController()
    {
        $file = 'controllers/' . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0]);
        } else {
            // echo "error 2";
            $this->err();
            return false;
        }

        
    }

    private function _callControllerMethod()
    {
        if (isset($this->_url[2])) {
            $this->_controller->{$this->_url[0][1]}($this->_url[0][2]);
        } else {
            if (isset($this->_url[1])) {
                if (method_exists($this->_controller, $this->_url[1])) {
                    $this->_controller->{$this->_url[1]}();
                } else {
                    // echo "error 1";
                    $this->err();
                }
            } else {
                $this->_controller->index();
            }
        }
    }

    private function err()
    {
        require 'controllers/err.php';
        $error = new Err();
        $error->index();
        return false;
    }
}
