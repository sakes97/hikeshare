<?php

class Register_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register_standard()
    {
        $query = ('CALL uspRegister(:firstname,:lastname,:pass,:email)');
        $params = array(
            ':firstname' => $_POST['inputFname'],
            ':lastname' => $_POST['inputLname'],
            ':pass' => Hash::create('md5', $_POST['inputPassword'],  HASH_PASSWORD_KEY),
            ':email' => $_POST['inputEmail']
        );
        $result = Database::Execute($query, $params);
        if($result){
            header('location:' . URL . 'dashboard');
        }
    }

    public function register_google()
    {}

    public function register_facebook()
    {}
}
