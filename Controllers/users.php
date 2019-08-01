<?php

class Users extends Base_controller {

    public static function function_Call($action){
        switch($action){
            case 'login':
                    loginUser();
                break;
            case 'signOut':
                    signOut();
                break;
        }
    }

    function loginUser(){

    }

}

?>