<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function someFunction()
    {
        echo 'dashboard_model->someFunction()';
    }
}
