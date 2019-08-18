<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserDetails($id){
        $query = 'CALL uspGetUserDetails(:userid)';
        $params = array(':userid' => $id);
        return Database::GetRow($query,$params);
    }
}
