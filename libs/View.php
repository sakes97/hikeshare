<?php

class View
{
    public function __construct()
    {}

    public function render($name, $nav_type = 'basic_nav', $noInclude = false)
    {
        if ($noInclude == true) {
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        } else {
            require 'views/header.php';
            require 'views/' . $nav_type . '.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }

    }
}
