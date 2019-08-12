<?php

require_once("Class/Database.php");


class  User {

    private $userid;
    private $username;
    private $fname;
    private $lname;
    private $password;
    private $email;
    private $gender;
    private $contact_num;
    private $dob;
    private $active;

    public function _construct(){}

    public function get_all_users(){
        $query = 'CALL uspGetAllUsers()';
        return Database::GetRow($query);
    }

    public function reg_user(){

        $fname = $_POST['inputFname'];
        $lname = $_POST['inputLname'];
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];

        $query = 'CALL uspRegister(:firstname, :lastname, :email, :pass)';
        $params = array(
            ':firstname' => $fname,
            ':lastname' => $lname,
            ':email' => $email,
            ':pass' => $password
        );

        $result = Database::Execute($query, $params);
        
        // if($result){
        //     header("Location: dashboard");
        // }else{
        //     header("Location: signup?result=fail");
        // }
    }

    public function login_user($email, $password){
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];

        $query = 'CALL uspSignIn(:email, :pass)';
        $params = array(
            ':email' => $email,
            ':pass' => $password
        );
        return Database::GetRow($query, $params);
    }

    public function update_profile_details(){
        //update profile
    }

    public function delete_profile(){
        //delete user profile
    }

    public function change_display_picture(){
        //update profile picture
    }

    public function set_preference(){
        //set user preference
    }

    public function user_logout(){
        //user logout 
    }

}