<?php

class Register extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->title = "hikeshare - Login";
        $this->view->render('register/index');
    }

    public function register_standard()
    {
        $this->model->register_standard();
    }
    
    public function register_facebook(){}
    public function register_google(){}
}
