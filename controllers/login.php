<?php 

class Login extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('login/index');
    }

    public function run(){
        //method to login user - business logic is stored in the login model
        $this->model->run();
    }
}