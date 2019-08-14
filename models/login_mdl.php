<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $query = 'CALL uspLogin(:login, :password)';
        $params = array(
            ':login' => $_POST['input_username'],
            ':password' => $_POST['input_password']
        );
        $result = Database::GetRow($query,$params);
        
        if(!empty($result))
        {
            header("location: ../dashboard");
        }else {
            echo "empty" ;
            // header("location: ../login");
        }
    }

}
