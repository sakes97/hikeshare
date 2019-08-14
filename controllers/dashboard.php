<?php

class Dashboard extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Session::init();
        $session = Session::get('loggedin');
        if ($session == false) {
            Session::destroy();
            header("location: ../login");
            exit;
        }
    }

    public function index()
    {
        $this->view->render('dashboard/index');
    }

    public function logout()
    {
        Session::destroy();
        header("location: ../login");
        exit;
    }

}
