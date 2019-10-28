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

    public function search_Any()
    {
        if(isset($_GET['action'])){

            if($_GET['action'] == "find-match"){

                if(isset($_GET['from']) && isset($_GET['to']))
                {
                    return $this->_s_any($_GET['from'], $_GET['to']);
                }


            }else if($_GET['action'] == "search-ride"){

                if(isset($_POST['origin-input']) && isset($_POST['destination-input']))
                {
                    return $this->_s_any($_POST['origin-input'], $_POST['destination-input']);
                }else if(isset($_GET['from']) && isset($_GET['to'])){
                    return $this->_s_any($_GET['from'],$_GET['to']);
                }

            }
        }
        
    }

    private function _s_any($from, $to)
    {
        $query = 'CALL uspSearch_Any(:departure_from, :destination)';
        $params = array(
            ':departure_from' => trim(filter_var($from, FILTER_SANITIZE_STRING)),
            ':destination' => trim(filter_var($to, FILTER_SANITIZE_STRING))
        );
        return Database::GetAll($query, $params);
    }

    public function getRidesRequests($rideid)
    {
        $query = 'CALL uspGetRidesRequests(:rideid)';
        $params = array(':rideid'=>$rideid);
        return Database::GetAll($query,$params);
    }

    public function getRequestCount($rideid)
    {
        $query = 'CALL uspGetRequestCount($rideid)';
        $params = array(':rideid'=>$rideid);
        return Database::GetRow($query,$params);
    }

    public function getAllRequestCount()
    {
        $query = 'CALL uspGetAllRequestCount()';
        return Database::GetRow($query);
    }

    public function getAwaitingRequests()
    {
        $query = 'CALL uspGetAwaitingRequests()';
        return Database::GetAll($query);
    }

    public function getDriverBookedTrips($userid)
    {
        $query = 'CALL uspGetDriverBookedTrips(:userid)';
        $params = array(':userid'=>$userid);
        return Database::GetAll($query,$params);
    }

    public function getTripsPassengers($rideid)
    {
        $query = 'CALL uspGetTripsPassengers(:rideid)';
        $params = array(':rideid' => $rideid);
        return Database::GetAll($query, $params);
    }

    public function getPassengerBookedTrips($userid)
    {
        $query = 'CALL uspGetPassengerBookedTrips(:userid)';
        $params = array(':userid' => $userid);
        return Database::GetAll($query, $params);
    }

    public function getRequest($requestid)
    {
        $query = 'CALL uspGetRequest(:requestid)';
        $params = array(':requestid'=>$requestid);
        return Database::GetRow($query, $params);
    }

    public function getBookedTrips_O($passengerid=null,$driverid=null)
    {
        $query='CALL uspGetBookedTrips_O(:passengerid, :driverid)';
        $params = array(
            ':passengerid'=>$passengerid,
            ':driverid'=>$driverid
        );
        return Database::GetAll($query,$params);
    }

    public function getBookedTrips_R($passengerid=null, $driverid=null)
    {
        $query = 'CALL uspGetBookedTrips_R(:passengerid, :driverid)';
        $params = array(
            ':passengerid' => $passengerid,
            ':driverid' => $driverid
        );

        return Database::GetAll($query, $params);
        
    }

    public function getAllRequests()
    {
        $query = 'CALL uspGetAllRequests()';
        return Database::GetAll($query);
    }

    public function getRequestsByUser($userid)
    {
        $query = 'CALL uspGetRequestsByUser(:userid)';
        $params = array(':userid'=>$userid);
        return Database::GetAll($query, $params);
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
                        $this->_setSchedule($rideid, $day);
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
            ':seats_available' => filter_var($_POST['seats_available'], FILTER_SANITIZE_NUMBER_INT),
            ':contribution_per_head' => filter_var(sprintf("%.2f",$_POST['contribution_per_head']), FILTER_SANITIZE_NUMBER_FLOAT),
            ':departure_date' => $_POST['departure_date'],
            ':departure_time' => $_POST['departure_time'],
            ':departure_from' =>filter_var($_POST['origin-input'], FILTER_SANITIZE_STRING),
            ':destination' => filter_var($_POST['destination-input'], FILTER_SANITIZE_STRING),
            ':extra_details' => filter_var($_POST['extra_details'], FILTER_SANITIZE_STRING),
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

            header("location:" . URL . 'dashboard/frmResults/'.$rideid.'?action=search-ride&role=driver&for='.$rideid.'&from='.$from.'&to='.$to);
        }
        else
        {
            header("location:" . URL . "err/index?offer=fail");
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
                        $this->_setSchedule($rideid, $day);
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
            ':departure_from' => filter_var($_POST['origin-input'], FILTER_SANITIZE_STRING),
            ':destination' => filter_var($_POST['destination-input'], FILTER_SANITIZE_STRING),
            ':extra_details' => filter_var($_POST['extra_details'], FILTER_SANITIZE_STRING),
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
            ':seats_available' => filter_var($_POST['seats_available'], FILTER_SANITIZE_NUMBER_INT),
            ':contribution_per_head' => filter_var(sprintf("%.2f",$_POST['contribution_per_head']), FILTER_SANITIZE_NUMBER_FLOAT),
            ':departure_date' => $_POST['return_date'],
            ':departure_time' => $_POST['return_time'],
            ':departure_from' => filter_var($_POST['destination-input'], FILTER_SANITIZE_STRING),
            ':destination' => filter_var($_POST['origin-input'], FILTER_SANITIZE_STRING),
            ':extra_details' => filter_var($_POST['extra_details'], FILTER_SANITIZE_STRING),
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

    private function _setSchedule($rideid, $dayid)
    {
        $query = 'CALL uspSetSchedule(:rideid, :dayid)';
        $params = array(
            ':rideid' => $rideid,
            ':dayid' => $dayid
        );
        $result = Database::Execute($query, $params);
        return $result;
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

    public function request($tripid=null,$userid=null, $matching_rideid=null)
    {   
        $reqid = Util::generate_id();

        if(isset($_POST['rideid']) && isset($_POST['userid'])){
            //when a passenger requests a lift 
            $tripid = $_POST['rideid'];
            $userid = $_POST['userid'];
            if(isset($_POST['matching_rideid']))
                $matching_rideid = $_POST['matching_rideid'];

            $query = 'CALL uspRequest(:requestid, :rideid, :matching_rideid, :userid, :date_requested, :seats_for)';
            $params = array(
                ':requestid'=>$reqid,
                ':rideid'=>$tripid,
                ':userid'=>$userid,
                ':matching_rideid'=>$matching_rideid,
                ':date_requested'=>date('Y-m-d H:i:s', time()),
                ':seats_for'=>$_POST['seats_for']
            );
            Database::Execute($query, $params);

            if(!empty($this->getRequest($reqid))){
                header('location:' . URL . 'dashboard/frmNoti?as=p&view=request&status=success');
            }else{
                header('location:' . URL . 'err/index?request=fail&as=passenger');
            }

        }else{
            //when a driver offers a lift
            $query = 'CALL uspRequest(:requestid, :rideid, :matching_rideid, :userid, :date_requested, :seats_for)';
            $params = array(
                ':requestid'=>$reqid,
                ':rideid'=>$tripid,
                ':userid'=>$userid,
                ':matching_rideid'=>$matching_rideid,
                ':date_requested'=>date('Y-m-d H:i:s', time()),
                ':seats_for'=> 1
            );
            Database::Execute($query, $params);

            if(!empty($this->getRequest($reqid))){
                header('location:' . URL . 'dashboard/frmNoti?as=d&view=offer&status=success');
            }else{
                header('location:' . URL . 'err/index?request=fail&as=d');
            }
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

    private function _setBooked($rideid)
    {
        $query = 'CALL uspSetBooked(:rideid)';
        $params = array(':rideid' => $rideid);
        Database::Execute($query,$params);
    }

    public function requestResponse($requestid, $rideid, $answer, $usertype, $seats=null, $userid=null, $matching_rideid=null, $passengerid=null)
    {
        if($answer == "Accepted")
        {
            $this->_handleRequestResponse($requestid,$rideid,$answer);
            switch($usertype){
                case 'D':
                    $this->_updateSeatCount($rideid, $seats);
                    $offer = $this->getOffer($rideid, $userid);
                    if($offer['seats_available'] < 1)
                    {
                        //set the drivers ride to booked
                        $this->_setBooked($rideid);    
                    }
                
                    //if not null, set the passengers ride to booked
                    if($matching_rideid != null)
                        $this->_setBooked($matching_rideid);

                    $this->_addPassenger($rideid, $passengerid,$offer['userid']);
                    
                    header('location:' . URL . 'dashboard/frmNoti?as=d&view=response-noti&status=Accepted');
                break;

                case 'P':
                    //set request status to answer
                    $this->_handleRequestResponse($requestid,$rideid,$answer);
                    
                    //update drivers rides seat count 
                    $this->_updateSeatCount($matching_rideid, $seats);

                    $offer = $this->getOffer($matching_rideid, $userid);
                    if($offer['seats_available'] < 1)
                    {
                        //set the drivers ride to booked
                        $this->_setBooked($matching_rideid);    
                    }

                    //update passenger ride/lift request status to booked 
                    $this->_setBooked($rideid);

                    $this->_addPassenger($matching_rideid, $passengerid, $userid);

                    header('location:' . URL . 'dashboard/frmNoti?as=p&view=offer-noti&status=Accepted');
                break;
            }
        }
        else if($answer == "Declined")
        {
            $this->_handleRequestResponse($requestid,$rideid,$answer);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    private function _handleRequestResponse($requestid, $rideid, $answer)
    {
        $query = 'CALL uspRequestResponse(:requestid, :rideid, :answer)';
        $params = array(
            ':requestid' => $requestid, 
            ':rideid' => $rideid,
            ':answer' => $answer
        );
        Database::Execute($query, $params);
    }

    private function _addPassenger($rideid, $passengerid, $driverid)
    {
        $query = 'CALL uspAddPassenger(:rideid, :passengerid, :driverid)';
        $params = array(
            ':rideid'=>$rideid, 
            ':passengerid'=>$passengerid, 
            ':driverid'=>$driverid
        );
        Database::Execute($query,$params);
    }
    #endregion

    #endregion

    #region Messages 

    #region GETS
    public function getUsersConversations($userid)
    {
        $query = 'CALL uspGetUsersConversations(:userid)';
        $params = array(":userid"=>$userid);
        return Database::GetAll($query, $params);
    }

    public function getMessages($conversationid)
    {
        $query = 'CALL uspGetMessages(:conversationid)';
        $params = array(':conversationid' => $conversationid);
        return Database::GetAll($query, $params);
    }

    public function xhrGetMessages($conversationid)
    {
        $query = 'CALL uspGetMessages(:conversationid)';
        $params = array(':conversationid' => $conversationid);
        $data = Database::GetAll($query, $params);
        // $data = json_encode($data);
        return $data;
    }
    #endregion

    #region EXECUTES
    public function sendMessage()
    {
        if(isset($_POST['conversationid']))
        {
            $conversationid = $_POST['conversationid'];
        }else{
            $conversationid = Util::generate_id();
        }

        $senderid = $_POST['senderid'];
        $recipientid = $_POST['recipientid'];
        $msg = $_POST['msg'];

        $query = 'CALL uspSendMessage(:conversationid, :senderid, :recipientid, :msg)';
        $params = array(
            ':conversationid' => $conversationid, 
            ':senderid' => $senderid, 
            ':recipientid' => $recipientid,
            ':msg' => htmlentities($msg)
        );

        Database::Execute($query, $params);
        header("location:" . URL . "dashboard/frmMessages/null/".$conversationid."?view=user-chat");
    }
    #endregion

    #endregion 

    #region Reviews

    #region GET

    public function getReviewOfUser($reviewerid, $revieweeid)
    {
        $query = 'CALL uspGetReviewOfUser(:reviewerid, :revieweeid)';
        $params = array(
            ':reviewerid' => $reviewerid,
            ':revieweeid' => $revieweeid
        );
        return Database::GetRow($query, $params);
    }
    #endregion


    #region Execute

    public function reviewUser()
    {
        $reviewid = Util::generate_id();
        $reviewerid = $_POST['reviewerid'];
        $revieweeid = $_POST['revieweeid'];
        $rating = intval($_POST['rating']);
        $rating = $rating + 1;
        $comment = $_POST['review_comment'];


        $query = 'CALL uspReviewUser(:reviewid, :reviewerid, :revieweeid, :rating, :review_comment)';
        $params = array(
            ':reviewid' => $reviewid,
            ':reviewerid' => $reviewerid,
            ':revieweeid' => $revieweeid,
            ':rating' => $rating,
            ':review_comment' => $comment
        );
        $result = Database::Execute($query, $params);

        if($result)
        {
            header("Location: {$_REQUEST["return_to"]}&status=success");
        }else if(!$result){
            header("Location: {$_REQUEST["return_to"]}&status=fail");
        }


    }


    #endregion


    #endregion
}
