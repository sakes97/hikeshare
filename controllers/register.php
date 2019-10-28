<?php

class Register extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->title = "hikeshare - Register";
        $this->view->render('register/index','basic_nav',true);
    }

    public function register_standard()
    {
        $this->model->register_standard();
    }
}
