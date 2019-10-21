<?php

class Dashboard extends Controller
{
    private $_userid = null;

    public function __construct()
    {
        parent::__construct();

        $this->_handleLogin();

        $this->_userid = $this->_getUserID();

        $this->_loadJS();
    }
    #region Index
    public function index()
    {
        //view title
        $this->view->title = "Dashboard";

        // $this->view->this_id = $this->_userid;

        //get user details 
        $this->_getUserDetails($this->_userid);
        
        //as driver
        $this->_getNumOfActiveOffers($this->_userid);
        $this->_getActiveOffers($this->_userid);
        $this->_getBkd_Club_D(null, $this->_userid);
        $this->_getBookedTrips_O_D(NULL,$this->_userid);

        //as passenger
        $this->_getPassengerActivePosts($this->_userid);
        $this->_getRequestsByUser($this->_userid);
        $this->_getBkd_Club_P($this->_userid, null);
        $this->_getBookedTrips_O_P($this->_userid,null);


        $this->_getAllRequestCount();

        //render view
        $this->view->render('dashboard/index', 'user_nav');
    }
    #endregion

    #region Profile
    public function profile()
    {
        $this->view->title = "Profile";
        $this->_getUserDetails($this->_userid);
        $this->_getCars($this->_userid);
        $this->_getNumCars($this->_userid);
        $this->view->render('dashboard/profile', 'user_nav');
    }

    public function updateProfileDetails($userid)
    {
        $this->model->updateProfileDetails($userid);
    }

    public function updateProfilePicture($userid)
    {
        $this->model->updateProfilePicture($userid);
    }

    public function disableAccount($userid)
    {
        $this->model->disableAccount($userid);
    }

    public function updatePreferences($userid)
    {
        $this->model->updatePreferences($userid);
    }

    private function _getUserDetails($userid)
    {
        $this->view->user = $this->model->getUserDetails($userid);
    }

    private function _getUserID()
    {
        $user_session = Util::get_session('loggedin');
        $userid = $user_session['userid'];
        return $userid;
    }
    
    public function xhrLoadUser()
    {
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = $_POST['id'];
            $profile = $this->model->getUserDetails($id);
            if(isset($profile) && !empty($profile))
            {
                $data = array();
                $data['userid'] = $profile['userid'];
                $data['firstname'] = $profile['firstname'];
                $data['lastname'] = $profile['lastname'];
                $data['bio'] = $profile['bio'];
                $data['email'] = $profile['email'];
                $data['gender'] =$profile['gender'];
                $data['dob'] = $profile['dob'];
                // $data['picture'] = $profile['picture'];
                $data['date_joined']= $profile['date_joined'];
                $data['alcohol_yn'] =$profile['alcohol_yn'];
                $data['pets_yn'] = $profile['pets_yn'];
                $data['smoking_yn'] = $profile['smoking_yn'];
            
                echo json_encode($data);
            }
        }
    }
    #endregion

    #region Ride

    //view rendering
    public function offer_Ride()
    {
        $this->view->title = "Add a Journey";
        $this->_getUserDetails($this->_userid);
        $this->_getDays();
        $this->_getCars($this->_userid);
        $this->view->render('dashboard/ride/offer', 'user_nav');
    }

    public function find_Ride()
    {
        if(isset($_GET['role']))
        {
            ($_GET['role'] == "p") ? $this->view->title = "Find A Driver" : $this->view->title = "Find A Passenger";
        }
        $this->_getUserDetails($this->_userid);
        $this->_getDays();
        $this->_search_Any();
        $this->view->render('dashboard/ride/find-a-ride', 'user_nav');
    }

    public function frmPostRequest()
    {
        $this->view->title = "Post a request";
        $this->_getUserDetails($this->_userid);
        $this->_getDays();
        $this->view->render('dashboard/ride/post-request', 'user_nav');
    }

    public function View_Ride_History()
    {
        $this->view->title = "Ride History";
        $this->_getUserDetails($this->_userid);

        $this->_getPastOffers($this->_userid);
        


        //render view 
        $this->view->render('dashboard/ride/ride-history', 'user_nav');
    }

    public function View_Offer_Details($rideid, $driverid, $ride_type)
    {
        $this->_getUserDetails($this->_userid);
        $this->view->title = "Offer Details";
        $this->_getOffer($rideid,$driverid);
        $this->_getRidesRequests($rideid);
        $this->_getReturn($rideid);
        $this->_getTripsPassengers($rideid);
        if($ride_type == 'R')
        {
            $this->_getTripSchedule($rideid);
        }
        $this->view->render('dashboard/ride/view-offer-details', 'user_nav');
    }

    public function frmViewBooking($pID, $rideid, $ride_type, $return_trip)
    {
        $this->view->title = "View Booking Details";
        $this->_getBooking($pID,$rideid);
        $this->_getRidesRequests($rideid);
        if($ride_type == 'R')
        {
            $this->_getTripSchedule($rideid);
        }
        if($return_trip == 'Y')
        {
            $this->_getReturn($rideid);
        }
        $this->view->render('dashboard/ride/view-booking-details', 'user_nav');
    }

    public function frmResults($rideid=null)
    {
        $this->view->title = "Matching Results";
        $this->_getUserDetails($this->_userid);
        $this->_getOffer($rideid, $this->_userid);
        $this->_getBooking($this->_userid, $rideid);
        $this->_getTripAndReturn($this->_userid,$rideid);
        $this->_getTripSchedule($rideid);
        $this->_getRequestsByUser($this->_userid);
        $this->_search_Any();
        $this->_getRidesRequests($rideid);
        $this->_getAllRequests();
        $this->view->render('dashboard/ride/results', 'user_nav');
    }

    public function frmNoti()
    {
        $this->view->title = "Notification";

        $this->view->render('dashboard/ride/notification', 'user_nav');
    }

    public function frmViewRequests()
    {
        $this->view->title = "Requests";
        $this->_getAwaitingRequests();
        $this->view->render('dashboard/ride/requests', 'user_nav');
    }

    //gets and executes
    public function offerRide($driverid)
    {
        $this->model->offerRide($driverid);
    }

    public function postRideRequest($passengerid)
    {
        $this->model->postRideRequest($passengerid);
    }

    private function _getAwaitingRequests()
    {
        $this->view->awaiting_requests = $this->model->getAwaitingRequests();
    }

    private function _getOffers($driverid)
    {
        $this->view->offers = $this->model->getOffers($driverid);
    }

    private function _getPastOffers($driverid)
    {
        $this->view->pastOffers = $this->model->getPastOffers($driverid);
    }
    
    private function _getActiveOffers($driverid)
    {
        $this->view->activeOffers = $this->model->getActiveOffers($driverid);
    }

    private function _getPassengerActivePosts($passengerid)
    {
        $this->view->active_pass_post = $this->model->getPassengerActivePosts($passengerid);
    }

    private function _getDays()
    {
        $this->view->days = $this->model->getDays();
    }

    private function _getNumOfActiveOffers($driverid)
    {
        $this->view->NUM_OF_ACTIVE_OFFERS = $this->model->getNumOfActiveOffers($driverid); 
    }

    private function _getNumOfPastOffers($driverid)
    {
        $this->view->NUM_OF_PAST_OFFERS = $this->model->getNumOfPastOffers($driverid); 
    }

    private function _getTripSchedule($rideid)
    {
        $this->view->trip_schedule = $this->model->getTripSchedule($rideid);
    }

    private function _getOffer($rideid, $driverid)
    {
        $this->view->rideOffer = $this->model->getOffer($rideid, $driverid);
    }

    private function _getBooking($passengerid, $rideid)
    {
        $this->view->booking = $this->model->getBooking($passengerid, $rideid);
    }

    private function _getReturn($rideid)
    {
        $this->view->return_trip = $this->model->getReturn($rideid);
    }

    public function deleteTravel($return_trip, $rideid, $userid, $ride_type)
    {
        $this->model->deleteTravel($return_trip, $rideid, $userid, $ride_type);
    }
    private function _getTripAndReturn($userid, $rideid)
    {
        $this->view->returnTrip = $this->model->getTripAndReturn($userid, $rideid);
    }

    private function _search_Any()
    {
        $this->view->res_any = $this->model->search_Any();
    }

    public function getRequest($requestid)
    {
        $this->view->request = $this->model->getRequest($requestid);
    }

    private function _getRidesRequests($rideid)
    {
        $this->view->rides_requests = $this->model->getRidesRequests($rideid);
    }
    
    public function request($tripid=null,$userid=null,$matching_rideid=null)
    {
        $this->model->request($tripid,$userid,$matching_rideid);
    }

    private function _getRequestCount($rideid)
    {
        $this->view->request_count = $this->model->getRequestCount($rideid);
    }

    private function _getAllRequestCount()
    {
        $this->view->count_all_requests = $this->model->getAllRequestCount();
    }

    public function requestResponse($requestid, $rideid, $answer, $usertype,$seats=null,$userid=null, $matching_rideid=null,$passengerid=null)
    {
        $this->model->requestResponse($requestid, $rideid, $answer, $usertype, $seats,$userid, $matching_rideid,$passengerid);
    }

    private function _getDriverBookedTrips($userid)
    {
        $this->view->driverBookedTrips = $this->model->getDriverBookedTrips($userid);
    }

    private function _getTripsPassengers($rideid)
    {
        $this->view->passengers = $this->model->getTripsPassengers($rideid);
    }

    private function _getPassengerBookedTrips($userid)
    {
        $this->view->pasBookedTrips = $this->model->getPassengerBookedTrips($userid);
    }

    private function _getBookedTrips_O_P($passengerid=null, $driverid=null)
    {
        $this->view->upcomingBkdTrips_P = $this->model->getBookedTrips_O($passengerid,$driverid);
    }
    
    private function _getBookedTrips_O_D($passengerid=null, $driverid=null)
    {
        $this->view->upcomingBkdTrips_D = $this->model->getBookedTrips_O($passengerid,$driverid);
    }

    private function _getBkd_Club_D($passengerid=null, $driverid=null)
    {
        $this->view->club_D = $this->model->getBookedTrips_R($passengerid, $driverid);
    }

    private function _getBkd_Club_P($passengerid=null, $driverid=null)
    {
        $this->view->club_P = $this->model->getBookedTrips_R($passengerid, $driverid);
    }
    
    private function _getRequestsByUser($userid)
    {
        $this->view->users_requests = $this->model->getRequestsByUser($userid);
    }

    private function _getAllRequests()
    {
        $this->view->all_requests = $this->model->getAllRequests();
    }
    #endregion

    #region Reviews
    public function review_past_rides()
    {
        $this->view->title = "Review Past Rides";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/reviews/review-past-rides', 'user_nav');
    }
    public function view_Review()
    {
        $this->view->title = "View Review";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/reviews/view-review', 'user_nav');
    }
    public function review_ride()
    {
        $this->view->title = "Review Ride";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/reviews/review-ride', 'user_nav');
    }
    #endregion

    #region Messages
    public function frmMessages($userid=null,$conversationid=null)
    {
        $this->view->title = "Message";
        $this->_getUserDetails($this->_userid);
        $this->_getUsersConversations($userid);
        $this->_getMessages($conversationid);
        $this->view->css = 'public/css/message.css';
        $this->view->render('dashboard/messages/messages','user_nav');
    }

    //gets/executes 
    private function _getUsersConversations($userid)
    {
        $this->view->conversations = $this->model->getUsersConversations($userid);
    }

    private function _getMessages($conversationid)
    {
        $this->view->messages = $this->model->getMessages($conversationid);
    }

    public function sendMessage()
    {
        $this->model->sendMessage();
    }

    /** ajax functions */
    public function _xhrGetMessages()
    {
        $conversationid = $_POST['id'];

        $data = $this->model->xhrGetMessages($conversationid);
        if(count($data) > 0)
            echo json_encode($data);
    }

    public function xhrSendMessage()
    {
        // $this->model->sendMessage($conversationid, $senderid, $recipientid, $msg);        
    }


    #endregion

    #region Car

    public function viewCars()
    {
        $this->view->title = "View Cars";
        $this->_getCars($this->_userid);
        $this->_getNumCars($this->_userid);
        $this->view->render('dashboard/car/view-cars', 'user_nav');
    }

    public function add_car()
    {
        $this->view->title = "Add Car";
        $this->_getUserDetails($this->_userid);
        $this->_getNumCars($this->_userid);
        $this->view->render('dashboard/car/add-car', 'user_nav');
    }

    public function update_Car($carid)
    {
        $this->view->title = "Update Car";
        $this->_getUserDetails($this->_userid);
        $this->_getCar($carid, $this->_userid);
        $this->view->render('dashboard/car/update-car', 'user_nav');
    }

    private function _getCars($driverid)
    {
        $this->view->cars = $this->model->getCars($driverid);
    }

    private function _getNumCars($driverid)
    {
        $this->view->num_of_cars = $this->model->getNumCars($driverid);
    }

    private function _getCar($carid, $driverid)
    {
        $this->view->myCar = $this->model->getCar($carid, $driverid);
    }

    public function addCar()
    {
        $this->model->addCar();
    }

    public function updateCar($carid)
    {
        $this->model->updateCar($carid);
    }

    public function updateCarImage($carid, $driverid)
    {
        $this->model->updateCarImage($carid, $driverid);
    }

    public function removeCar($carid, $driverid)
    {
        $this->model->removeCar($carid, $driverid);
    }

    #endregion 

    #region Other Methods
    private function _handleLogin()
    {
        Util::init_session();
        $session = Util::get_session('loggedin');
        if ($session['online'] === false) {
            Util::destroy_session();
            header('location:' . URL . 'login');
        } else if (!isset($session)) {
            header('location:' . URL . 'login');
        }
    }
    public function logout()
    {
        Util::destroy_session();
        header('location:' . URL . 'login');
    }
    private function _loadJS()
    {
        $this->view->js = array(
            'dashboard/js/datetimepickers.js',
            'dashboard/js/general.js',
            'dashboard/js/offer-ride.js',
            'dashboard/js/offer.js',
            'dashboard/js/profile.js',
            'dashboard/js/results.js',
            'dashboard/js/messages.js',
            'dashboard/js/ride-details.js',
            'dashboard/js/view-details'
        );
    }
    #endregion
}