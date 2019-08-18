<?php
//help controller

class Help extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->title = "hikeshare - Help";
        $this->view->render('help/index');
    }

}
