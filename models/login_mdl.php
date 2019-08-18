<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signin()
    {
        $query = 'CALL uspSignIn(:email, :pass)';
        $params = array(
            ':email' => $_POST['input_username'],
            ':pass' => Hash::create('md5', $_POST['input_password'], HASH_PASSWORD_KEY)
        );
        $result = Database::GetRow($query,$params);
        
        if(isset($result)){
            Session::set('loggedin', true);
            setcookie('user_id',$result['userid'],time() + (86400 * 30),"/");//cookie lasts a day
            header('location:' . URL . 'dashboard');
            exit;
        }else {
            echo "empty" ;
        }
    }

}
