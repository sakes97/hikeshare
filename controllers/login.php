<?php 

class Login extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        //echo Hash::create('md5', 'test', HASH_PASSWORD_KEY);

        $this->view->render('login/index');
    }

    public function signin(){
        //method to login user - business logic is stored in the login model
        $this->model->signin();
    }
}