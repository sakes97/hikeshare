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

    public function get_all (){
        $query = 'CALL uspGetAllUsers()';
        $result = Database::GetRow($query);
        $user = [];
        $user[0] = $result['userid'];
        $user[1] = $result['firstname'];
        $user[2] = $result['lastname'];
        $user[3] = $result['password'];
        return $user;
    }

    public function reg_user($fnam, $lname, $email, $password){
        //user registration
    }

    public function login_user($email, $password){
        //user login
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