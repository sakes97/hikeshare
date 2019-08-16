<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signin()
    {

        /*
        for password the login is going to have to be hashed 
        //side-note (to-do): create a user profile with the username and insert the users
        hashed password into the database//

        so -
        $params = array(
            ':email' => $_POST['email'],
            ':password' => Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY)
        );


        */

        $query = 'CALL uspSignIn(:email, :pass)';
        $params = array(
            ':email' => $_POST['input_username'],
            ':pass' => Hash::create('md5', $_POST['input_password'], HASH_PASSWORD_KEY)
        );
        $result = Database::GetRow($query,$params);
        
        if(isset($result)){
            header('location: ../dashboard');
            // print_r($result);
        }else {
            echo "empty" ;
            print_r($result);
            echo $result;
        }
    }

}
