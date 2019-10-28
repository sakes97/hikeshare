<?php

class Register_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register_standard()
    {
        $userid = Util::generate_id();
        $query = ('CALL uspRegister(:firstname,:lastname,:pass,:email, :userid)');
        $params = array(
            ':firstname' => $_POST['inputFname'],
            ':lastname' => $_POST['inputLname'],
            ':pass' => Util::create('md5', $_POST['inputPassword'], HASH_PASSWORD_KEY),
            ':email' => $_POST['inputEmail'],
            ':userid' => $userid,
        );
        $result = Database::Execute($query, $params);
        if (!empty($result)) {
            $arr = array(
                'online'=>true,
                'userid'=>$userid
            );
            Util::init_session();
            Util::set_session('loggedin',$arr);
            header('location:' . URL . 'dashboard/index?reg-msg=success');
        } else {
            header('location:' . URL .'register/index?register=fail');
        }
    }
}
