<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserDetails($id)
    {
        $query = 'CALL uspGetUserDetails(:userid)';
        $params = array(':userid' => $id);
        return Database::GetRow($query, $params);
    }


    public function getCars($id)
    {
        $query = 'CALL uspGetCars(:driverid)';
        $params = array(':driverid'=>$id);
        return Database::GetAll($query, $params);
    }

    public function addCar() 
    {
        $carid = Util::generate_id();
        $query = 'CALL uspAddCar(:carid, :driverid, :reg_num, 
                :make, :model, :model_year, :color, :seats, :car_image)';
        $params = array(
                ':carid' => $carid,
                ':driverid' =>$_POST['driverid'],
                ':reg_num' =>$_POST['registration_number'],
                ':make' =>$_POST['make'],
                ':model' =>$_POST['model'],
                ':model_year' =>$_POST['model_year'],
                ':color' =>$_POST['color'],
                ':seats' =>$_POST['number_of_seats'],
                ':car_image' =>$_POST['inputGroupFile01']
            );
        $result = Database::Execute($query,$params);
        if ($result)
        {
            header('location:' . URL . 'dashboard/profile?profile_view=3');
        }
        else
        {
            header('location:' . URL . 'error/addCar');
        }
    }

    public function updateCar()
    { }

    public function removeCar()
    { }
}
