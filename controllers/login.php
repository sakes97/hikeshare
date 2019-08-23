<?php

class Login extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->title = "hikeshare - Login";
        $this->view->render('login/index','basic_nav',true);
    }

    public function signin()
    {
        //method to login user - business logic is stored in the login model
        $this->model->signin();
    }
}
