<?php

class Base_controller {

    public static function CreateView($view_name){
        include('./Views/'.$view_name.'.php');
    }


}

?>