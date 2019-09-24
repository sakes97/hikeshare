<?php

class Err extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->title = "hikeshare - Error Page";
        $this->view->type = "Page";
        $this->view->render('error/index');
    }
    public function addCar()
    {
        $this->view->title = "Error - Add Car";
        $this->view->type = "Add-Car";
        $this->view->render('error/index');
    }
    public function updateCar()
    {
        $this->view->title = "Error - Update Car";
        $this->view->type = "Update-Car";
        $this->view->render('error/index');
    }
}
