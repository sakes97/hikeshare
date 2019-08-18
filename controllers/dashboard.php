<?php

class Dashboard extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
        Session::init();
        $session = Session::get('loggedin');
        if ($session === false) {
            Session::destroy();
            header('location:' . URL . 'login');
            exit;
        }
    }

    public function index()
    {
        $this->view->title = "User Dashboard";
        if(isset($_COOKIE['user_id'])){
            $this->view->user = $this->model->getUserDetails($_COOKIE['user_id']);
        } else {
            echo "dashboard > cookie not set"; //@remove
        }

        $cookie_val = $_COOKIE['user_id'];
        $this->view->render('dashboard/index','user_nav');
    }

    public function logout()
    {
        Session::destroy();//destroy the session
        setcookie("user_id", "", time()-3600);//remove cookie
        header('location:' . URL . 'login');
        exit;
    }

}
