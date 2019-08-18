<?php 
function set($key, $val){
    $_SESSION[$key] = $val;
}
function get($key){
    if (isset($_SESSION[$key])){
        return $_SESSION[$key];
    }
}


// $a1 = array("online"=>true, "userid"=>'Ddfaw2fasq1');
// set('loggedin',$a1);
// $session = get('loggedin');
// echo $session['userid'];
// var_dump($_SESSION);
session_start();
set('loggedin',true);
set('userid','dfadasdf');
set('role','Manager');
$loggedin = get('loggedin');
$userid = get('userid');
$role = get('role');
var_dump($_SESSION);
// echo $userid;
// echo $loggedin;
// echo $role;

