<?php 

require_once('routes.php');


//function to autoload that autoloads the classes from the Classes folder
//Essentially means we dont have to mention the routes class specifically
function __autoload($class_name){

    if(file_exists('./classes/'.$class_name.'.php')){
        require_once('./classes/'.$class_name.'.php');
    }else if(file_exists('./Controllers/'.$class_name.'.php')){
        require_once('./Controllers/'.$class_name.'.php');
    }

}


?>