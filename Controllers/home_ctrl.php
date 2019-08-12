<?php
require_once("Class/User_mdl.php");

class Home_ctrl extends Base_controller {


    public static function CreateView($view_name){
        include('./Views/'.$view_name.'.php');
    }

    
}


?>