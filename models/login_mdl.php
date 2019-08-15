<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {

        /*
        for password the login is going to have to be hashed 
        //side-note (to-do): create a user profile with the username and insert the users
        hashed password into the database//

        so -
        $params = array(
            ':email' => $_POST['email'],
            ':password' => Hash::create('md5', $_POST['password'], HASH_KEY)
        );


        */

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
