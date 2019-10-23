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
            ':pass' => Util::create('md5', $_POST['input_password'], HASH_PASSWORD_KEY)
        );
        $result = Database::GetRow($query,$params);
        
        if(!empty($result)){
            $arr = array(
                'online'=>true,
                'userid'=>$result['userid']
            );
            Util::init_session();
            Util::set_session('loggedin',$arr);
            $this->_expireOffers();
            header('location:' . URL . 'dashboard/index');
        }else {
            header('location:' . URL . 'login/index?login=fail');
        }
    }

    private function _expireOffers()
    {
        $query = 'CALL uspExpireOffers()';
        Database::Execute($query);
    }

}
