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
            $arr = array(
                'online'=>true,
                'userid'=>$result['userid']
            );
            Util::init_session();
            Util::set_session('loggedin',$arr);
            header('location:' . URL . 'dashboard');
            exit;
        }else {
            header('locatio:' . URL . 'login');
        }
    }

}
