<?php

class Dashboard extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
        Util::init_session();
        $session = Util::get_session('loggedin');
        if ($session['online'] === false) {
            Util::destroy_session();
            header('location:' . URL . 'login');
            exit;
        }else if (!isset($session)){
            header('location:' . URL . 'login');
            exit;
        }

        $this->view->js = array(
            'dashboard/js/dashboard.js'
        );
    }

    public function index()
    {
        $this->view->title = "User Dashboard";
        $user_session = Util::get_session('loggedin');
        $this->view->user = $this->model->getUserDetails($user_session['userid']);
        $this->view->render('dashboard/index','user_nav');
    }

    public function logout()
    {
        Util::destroy_session();
        header('location:' . URL . 'login');
        exit;
    }

}
