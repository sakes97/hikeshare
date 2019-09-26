<?php

class Dashboard_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    #region Car 

    #region Get Functions 
    public function getCars($driverid)
    {
        $query = 'CALL uspGetCars(:driverid)';
        $params = array(':driverid' => $driverid);
        return Database::GetAll($query, $params);
    }

    public function getCar($carid, $driverid)
    {
        $query = 'CALL uspGetCar(:carid, :driverid)';
        $params = array(
            ':carid' => $carid,
            ':driverid' => $driverid
        );
        return Database::GetRow($query, $params);
    }

    public function getNumCars($driverid)
    {
        $query = 'CALL uspGetNumCars(:driverid)';
        $params = array(':driverid' => $driverid);
        return Database::GetRow($query, $params);
    }
    #endregion

    #region Execute Functions
    public function addCar()
    {
        $carid = Util::generate_id();
        $query = 'CALL uspAddCar(:carid, :driverid, :reg_num, 
                :make, :model, :model_year, :color, :seats, :car_image)';
        $params = array(
            ':carid' => $carid,
            ':driverid' => $_POST['driverid'],
            ':reg_num' => $_POST['registration_number'],
            ':make' => $_POST['make'],
            ':model' => $_POST['model'],
            ':model_year' => $_POST['model_year'],
            ':color' => $_POST['color'],
            ':seats' => $_POST['number_of_seats'],
            ':car_image' => file_get_contents($_FILES['inputGroupFile01']['tmp_name'])
        );
        $result = Database::Execute($query, $params);
        if ($result) {
            header('location:' . URL . 'dashboard/viewCars');
        } else {
            header('location:' . URL . 'err/addCar');
        }
    }

    public function updateCar($carid)
    {
        $query = 'CALL uspUpdateCar(:carid, :driverid, :reg_num, 
                :make, :model, :model_year, :color, :seats, :car_image)';
        $params = array(
            ':carid' => $carid,
            ':driverid' => $_POST['driverid'],
            ':reg_num' => $_POST['registration_number'],
            ':make' => $_POST['make'],
            ':model' => $_POST['model'],
            ':model_year' => $_POST['model_year'],
            ':color' => $_POST['color'],
            ':seats' => $_POST['number_of_seats'],
            ':car_image' => file_get_contents($_FILES['inputGroupFile01']['tmp_name'])
        );
        $result = Database::Execute($query, $params);
        if ($result) {
            header('location:' . URL . 'dashboard/viewCars');
        } else {
            header('location:' . URL . 'err/updateCar');
        }
    }

    public function removeCar($carid, $driverid)
    {
        $query = 'CALL uspRemoveCar(:carid, :driverid)';
        $params = array(
            ':carid' => $carid,
            ':driverid' => $driverid
        );
        $result = Database::Execute($query, $params);
        if ($result) {
            header('location:' . URL . 'dashboard/viewCars');
        } else {
            header('location:' . URL . 'err/index');
        }
    }
    #endregion

    #endregion 

    #region User Profile

    #region Get Functions
    public function getUserDetails($id)
    {
        $query = 'CALL uspGetUserDetails(:userid)';
        $params = array(':userid' => $id);
        return Database::GetRow($query, $params);
    }
    #endregion

    #region Execute Functions 
    public function updateUserDetails($userid)
    {
        $query = 'CALL uspUpdateProfileDetails(:userid, :firstname,
            :lastname, :bio, :user_password, :email, :gender, :contact_num,
            :dob';
        $params = array(
            ':userid' => $userid,
            ':firstname' => $_POST['firstname'], 
            ':lastname' => $_POST['lastname'],
            ':bio' => $_POST['bio'],
            ':user_password' => $_POST['inputPassword'],
            ':email' => $_POST['email'],
            ':gender' => $_POST['gender'],
            ':contact_num' => $_POST['contact_num'],
            ':dob' => $_POST['dob']
        );
        $result = Database::Execute($query, $params);
        if ($result) {
            header('location:' . URL . 'dashboard/profile');
        } else {
            header('location:' . URL . 'err/index');
        }
    }
    public function disableAccount($userid)
    {
        $query = 'CALL uspDisableAccount(:userid)';
        $params = array(
            ':userid' => $userid
        );
        $result = Database::Execute($query, $params);
        if ($result) {
            header('location:' . URL . 'dashboard/logout');
        } else {
            header('location:' . URL . 'err/index');
        }
    }
    #endregion

    #endregion
}
