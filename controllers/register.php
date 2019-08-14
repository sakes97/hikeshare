<?php 

class Register extends Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('register/index');
    }

    public function register_standard(){
        $this->model->register_standard();
    }
}