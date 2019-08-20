<?php

class Err extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->title = "Error404";
        $this->view->render('error/index');
    }
}
