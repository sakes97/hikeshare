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
                :make, :model, :model_year, :color, :seats)';
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
    public function updateCarImage($carid, $driverid)
    {
        $query = 'CALL uspUpdateCarImage(:carid, :driverid, :car_image)';
        $params = array(
            ':carid' => $carid,
            ':driverid' => $driverid,
            ':car_image' => file_get_contents($_FILES['inputGroupFile01']['tmp_name'])
        );
        $result = Database::Execute($query,$params);
        if($result)
        {
            header('location:' . URL . 'dashboard/update_Car/'.$carid);
        }
        else
        {
            header('location:' . URL . 'err/index');
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
    public function updateProfileDetails($userid)
    {
        $query = 'CALL uspUpdateProfileDetails(:userid, :firstname,
            :lastname, :bio, :user_password, :email, :gender, :contact_num,
            :dob)';

        /**
         * Check if the user changed the password or not 
         * -if not send through the existing password
         * -if they changed it - create a new hashpassword for the password the user entered 
         */
        $user = $this->getUserDetails($userid);
        if ($_POST['inputPassword'] == $user['password']) {
            $password = $_POST['inputPassword'];
        } else {
            $password = Util::create('md5', $_POST['inputPassword'], HASH_PASSWORD_KEY);
        }

        $params = array(
            ':userid' => $userid,
            ':firstname' => $_POST['firstname'],
            ':lastname' => $_POST['lastname'],
            ':bio' => $_POST['bio'],
            ':user_password' => $password,
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
    public function updateProfilePicture($userid)
    {
        $query = 'CALL uspUpdateProfilePicture(:userid, :picture)';
        $params = array(
            ':userid' => $userid,
            ':picture' => file_get_contents($_FILES['inputGroupFile01']['tmp_name'])
        );
        $result = Database::Execute($query, $params);
        if ($result) {
            header('location:' . URL . 'dashboard/profile?profile_view=0');
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
    public function updatePreferences($userid)
    {
        $query = 'CALL uspUpdatePreferences(:userid, :alcohol_yn, :pets_yn, :smoking_yn)';
        $params = array(
            ':userid' => $userid,
            ':alcohol_yn' => $_POST['alcohol_yn'],
            ':pets_yn' => $_POST['pets_yn'],
            ':smoking_yn' => $_POST['smoking_yn']
        );
        $result = Database::Execute($query, $params);
        if ($result) {
            header('location:' . URL . 'dashboard/profile?profile_view=1');
        } else {
            header('location:' . URL . 'err/index');
        }
    }
    #endregion

    #endregion

    #region Ride

    #region Get Functions
    public function getOffers($driverid)
    {
        $query = 'CALL uspGetOffers(:driverid)';
        $params = array(':driverid' => $driverid);
        return Database::GetAll($query, $params);
    }

    public function getActiveOffers($driverid)
    {
        $query = 'CALL uspGetActiveOffers(:driverid)';
        $params = array(':driverid' => $driverid);
        return Database::GetAll($query, $params);
    }

    public function getPastOffers($driverid)
    {
        $query = 'CALL uspGetPastOffers(:driverid)';
        $params = array(':driverid'=>$driverid);
        return Database::GetAll($query,$params);
    }

    public function getDays()
    {
        $query = 'CALL uspDays()';
        return Database::GetAll($query);
    }

    public function getNumOfActiveOffers($driverid)
    {
        $query = 'CALL uspGetNumOfActiveOffers(:driverid)';
        $params = array(':driverid'=>$driverid);
        return Database::GetRow($query, $params);
    }

    public function getNumOfPastOffers($driverid)
    {
        $query = 'CALL uspGetNumOfPastOffers(:driverid)';
        $params = array(':driverid'=>$driverid);
        return Database::GetRow($query, $params);
    }

    public function getTripSchedule($rideid)
    {
        $query = 'CALL uspGetTripSchedule(:rideid)';
        $params = array(':rideid' => $rideid);
        return Database::GetAll($query,$params);
    }

    public function getOffer($rideid, $driverid)
    {
        $query = 'CALL uspGetOffer(:rideid, :driverid)';
        $params = array(
            ':rideid' => $rideid,
            ':driverid' => $driverid
        );
        return Database::GetRow($query,$params);
    }

    public function getReturn($rideid)
    {
        $query = 'CALL uspGetReturn(:rideid)';
        $params = array(':rideid'=>$rideid);
        return Database::GetRow($query,$params);
    }

    public function getTripAndReturn($userid, $rideid)
    {
        $query = 'CALL uspGetTripAndReturn(:userid, :rideid)';
        $params = array(
            ':userid' => $userid,
            ':rideid' => $rideid
        );
        return Database::GetAll($query, $params);
    }

    public function getPassengerActivePosts($passengerid)
    {
        $query = 'CALL uspGetPassengerActivePosts(:passengerid)';
        $params = array(':passengerid' => $passengerid);
        return Database::GetAll($query, $params);
    }

    public function getBooking($passengerid, $rideid)
    {
        $query = 'CALL uspGetBooking(:passengerid, :rideid)';
        $params = array(
            ':passengerid' => $passengerid,
            ':rideid' => $rideid
        );
        return Database::GetRow($query, $params);
    }

    public function search_Any($from, $to)
    {
        $query = 'CALL uspSearch_Any(:departure_from, :destination)';
        $params = array(
            ':departure_from' => $from,
            ':destination' => $to
        );
        return Database::GetAll($query, $params);
    }

    public function getRequest($requestid)
    {
        $query = 'CALL uspGetRequest(:requestid)';
        $params = array(':requestid'=>$requestid);
        return Database::GetRow($query,$params);
    }

    public function getRequestCount($rideid)
    {
        $query = 'CALL uspGetRequestCount($rideid)';
        $params = array(':rideid'=>$rideid);
        return Database::Execute($query,$params);
    }
    #endregion

    #region Execute Functions
    public function offerRide($driverid)
    {
        $rideid = Util::generate_id();

        $return_time = NULL; 

        if (isset($_POST['ride_type'])) {
            if ($_POST['ride_type'] == "R") {
                if (!empty($_POST['days_checklist'])) {
                    foreach ($_POST['days_checklist'] as $day) {
                        $this->setSchedule($rideid, $day);
                    }
                    $return_time = $_POST['return_time'];
                }
            } else if ($_POST['ride_type'] == "O"){
                if($_POST['return_trip'] == 'Y'){
                    $this->_driverReturn($driverid, $rideid);
                }
            }
        }

        $query = 'CALL uspOfferRide(:rideid, :driverid, :carid,
        :seats_available, :contribution_per_head, :departure_date, :departure_time,
        :departure_from, :destination, :extra_details, :ride_type, :date_posted, :return_time, :return_trip, :returnid)';

        $params = array(
            ':rideid' => $rideid,
            ':driverid' => $driverid,
            ':carid' => $_POST['car_for_ride'],
            ':seats_available' => $_POST['seats_available'],
            ':contribution_per_head' => sprintf("%.2f",$_POST['contribution_per_head']),
            ':departure_date' => $_POST['departure_date'],
            ':departure_time' => $_POST['departure_time'],
            ':departure_from' => $_POST['origin-input'],
            ':destination' => $_POST['destination-input'],
            ':extra_details' => $_POST['extra_details'],
            ':ride_type' => $_POST['ride_type'],
            ':date_posted' => date('Y-m-d H:i:s', time()),
            ':return_time' => $return_time,
            ':return_trip' => $_POST['return_trip'],
            ':returnid' => NULL
        );
    
        
        Database::Execute($query, $params);

        if(!empty($this->getOffer($rideid, $driverid)))
        {
            $from = $_POST['origin-input'];
            $to = $_POST['destination-input'];

            header("location:" . URL . 'dashboard/frmResults/'.$from.'/'.$to.'?role=driver');
        }
        else
        {
            header("location:" . URL . "err/index?offer-fail");
        }
    }

    public function postRideRequest($passengerid)
    {
        $rideid = Util::generate_id();
        
        $return_time = NULL; 

        if (isset($_POST['ride_type'])) {
            if ($_POST['ride_type'] == "R") {
                if (!empty($_POST['days_checklist'])) {
                    foreach ($_POST['days_checklist'] as $day) {
                        $this->setSchedule($rideid, $day);
                    }
                    $return_time = $_POST['return_time'];
                }
            } else if ($_POST['ride_type'] == "O"){
                if($_POST['return_trip'] == 'Y'){
                    $this->_passengerReturn($passengerid, $rideid);
                }
            }
        }
        
        $query = 'CALL uspPostRideRequest(:rideid, :passengerid, :departure_date,
        :departure_time, :return_time, :departure_from, :destination, :extra_details,
        :ride_type, :return_trip, :date_posted, :returnid)';

        $params = array(
            ':rideid' => $rideid,
            ':passengerid' => $passengerid,
            ':departure_date' => $_POST['departure_date'],
            ':departure_time' => $_POST['departure_time'],
            ':return_time' => $return_time,
            ':departure_from' => $_POST['origin-input'],
            ':destination' => $_POST['destination-input'],
            ':extra_details' => $_POST['extra_details'],
            ':ride_type' => $_POST['ride_type'],
            ':return_trip' => $_POST['return_trip'],
            ':date_posted' => date('Y-m-d H:i:s', time()),
            ':returnid' => NULL
        );

        $result = Database::Execute($query, $params);
        if($result)
        {
            header("location:" . URL . "dashboard/index");
        }
        else
        {
            header("location:" . URL . "err/index?postRideRequest");
        }
    }

    private function _driverReturn($driverid, $returnid)
    {
        $rideid = Util::generate_id();

        $query = 'CALL uspOfferRide(:rideid, :driverid, :carid,
        :seats_available, :contribution_per_head, :departure_date, :departure_time,
        :departure_from, :destination, :extra_details, :ride_type, :date_posted, :return_time, :return_trip,:returnid)';

        $params = array(
            ':rideid' => $rideid,
            ':driverid' => $driverid,
            ':carid' => $_POST['car_for_ride'],
            ':seats_available' => $_POST['seats_available'],
            ':contribution_per_head' => sprintf("%.2f",$_POST['contribution_per_head']),
            ':departure_date' => $_POST['return_date'],
            ':departure_time' => $_POST['return_time'],
            ':departure_from' => $_POST['destination-input'],
            ':destination' => $_POST['origin-input'],
            ':extra_details' => $_POST['extra_details'],
            ':ride_type' => $_POST['ride_type'],
            ':date_posted' => date('Y-m-d H:i:s', time()),
            ':return_time' => NULL,
            ':return_trip' => 'd',
            ':returnid' => $returnid
        );
        Database::Execute($query,$params);
    }

    private function _passengerReturn($passengerid, $returnid)
    {
        $rideid = Util::generate_id();

        $query = 'CALL uspPostRideRequest(:rideid, :passengerid, :departure_date,
        :departure_time, :return_time, :departure_from, :destination, :extra_details,
        :ride_type, :return_trip, :date_posted, :returnid)';

        $params = array(
            ':rideid' => $rideid,
            ':passengerid' => $passengerid,
            ':departure_date' => $_POST['return_date'],
            ':departure_time' => $_POST['return_time'],
            ':return_time' => NULL,
            ':departure_from' => $_POST['destination-input'],
            ':destination' => $_POST['origin-input'],
            ':extra_details' => $_POST['extra_details'],
            ':ride_type' => $_POST['ride_type'],
            ':return_trip' => 'd',
            ':date_posted' => date('Y-m-d H:i:s', time()),
            ':returnid' => $returnid
        );

        if(!Database::Execute($query,$params)){
            header("location:" . URL . "err/index");
        }
    }

    public function setSchedule($rideid, $dayid)
    {
        $query = 'CALL uspSetSchedule(:rideid, :dayid)';
        $params = array(
            ':rideid' => $rideid,
            ':dayid' => $dayid
        );
        $result = Database::Execute($query, $params);
        return $result;
    }

    public function expireOffers()
    {
        $query = 'CALL uspExpireOffers()';
        return Database::Execute($query);
    }

    public function deleteTravel($return_trip, $rideid, $userid, $ride_type)
    {
        $result = NULL;
        if($return_trip == 'Y')
        {
            $ride_and_return  = $this->getTripAndReturn($userid, $rideid);
            foreach($ride_and_return as $r){
                $query = 'CALL uspDeleteRide(:rideid, :userid)';
                $params = array(
                    ':rideid' => $r['rideid'],
                    ':userid' => $r['userid']
                );
                $result = Database::Execute($query, $params);        
            }
            if($result){
                header("location:" . URL . "dashboard/index");
            }
            else{
                header("location:" . URL . "err/index?delete-return-trip-fail");
            }
        } 
        else if ($return_trip == 'N' || $ride_type == 'R' || $return_trip == 'd')
        {
            $query = 'CALL uspDeleteRide(:rideid, :userid)';
            $params = array(
                ':rideid' => $rideid,
                ':userid' => $userid
            );
            $this->_deleteSchedule($rideid);
            $result = Database::Execute($query, $params);
            if($result)
            {
                header("location:" . URL . "dashboard/index");
            }
            else
            {
                header("location:" . URL . "err/index");
            }
        }

    }
    
    private function _deleteSchedule($rideid)
    {
        $query = 'CALL uspDeleteSchedule(:rideid)';
        $params = array(':rideid' => $rideid);
        Database::Execute($query,$params);
    }

    public function request($tripid=null,$userid=null)
    {   
        $reqid = Util::generate_id();
        if(isset($_POST['rideid']) && isset($_POST['userid'])){
            $tripid = $_POST['rideid'];
            $userid = $_POST['userid'];
        }

        $query = 'CALL uspRequest(:requestid, :rideid, :userid, :date_requested, :seats_for)';
        $params = array(
            ':requestid'=>$reqid,
            ':rideid'=>$tripid,
            ':userid'=>$userid,
            ':date_requested'=>date('Y-m-d H:i:s', time()),
            ':seats_for'=>$_POST['seats_for']
        );
        Database::Execute($query, $params);

        if(!empty($this->getRequest($reqid))){
            header('location:' . URL . 'dashboard/frmNoti?as=passenger&request=success');
        }else{
            header('location:' . URL . 'err/index?request=fail&as=passenger');
        }

    }

    private function _updateSeatCount($rideid, $seats)
    {
        $query = 'CALL uspUpdateSeatCount(:rideid, :seats)';
        $params = array(
            ':rideid' => $rideid,
            ':seats' =>$seats
        );
        Database::Execute($query, $params);
    }

    public function requestResponse($requestid, $rideid, $answer)
    {
        $query = 'CALL uspRequestResponse(:requestid, :rideid, :answer)';
        $params = array(
            ':requestid' => $requestid, 
            ':rideid' => $rideid,
            ':answer' => $answer
        );
        Database::Execute($query, $params);
        header('location:' . URL . 'dashboard/index');
    }
    #endregion

    #endregion
}
