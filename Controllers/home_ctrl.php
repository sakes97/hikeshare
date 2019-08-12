<?php
require_once("Class/User_mdl.php");

class Home_ctrl extends Base_controller {


    public static function CreateView($view_name){
        $user = self::home();
        include('./Views/'.$view_name.'.php');
    }

    private function home(){
        $user = new User();
        $u = $user->get_all();
        return $u;
    }

}


?>