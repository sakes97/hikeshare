<?php

class Route {

    public static $validRoutes = array();

    public static function set($route, $function) {

        self::$validRoutes[] = $route;
        
        /*
        allows for if theres code stored in the function, the invoke
        will execute all that code
        */
        if($_GET['url'] == $route){
            $function->__invoke();
        }



    }

}