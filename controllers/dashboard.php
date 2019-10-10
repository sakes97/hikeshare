<?php

class Dashboard extends Controller
{
    private $_userid = null;

    public function __construct()
    {
        parent::__construct();

        $this->_handleLogin();

        $this->_userid = $this->_getUserID();

        $this->view->js = array(
            'dashboard/js/datetimepickers.js',
            'dashboard/js/general.js',
            'dashboard/js/map.js',
            'dashboard/js/offer.js',
            'dashboard/js/profile.js'
        );

    }
    #region Index
    public function index()
    {
        //view title
        $this->view->title = "Dashboard";

        //get user details 
        $this->_getUserDetails($this->_userid);
        
        //as driver
        $this->_getNumOfActiveOffers($this->_userid);
        $this->_getActiveOffers($this->_userid);

        //as passenger
        $this->_getPassengerActivePosts($this->_userid);

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
    
    #endregion

    #region Ride
    public function offer_Ride()
    {
        $this->view->title = "Add a Journey";
        $this->_getUserDetails($this->_userid);
        $this->_getDays();
        $this->_getCars($this->_userid);
        $this->_getNumCars($this->_userid);
        $this->view->render('dashboard/ride/offer', 'user_nav');
    }

    public function find_Ride()
    {
        $this->view->title = "Find a ride";
        $this->_getUserDetails($this->_userid);
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
        
        /**
         * offers
         */
        //upcoming offers
        $this->_getActiveOffers($this->_userid);
        $this->_getNumOfActiveOffers($this->_userid);
        //past offers
        $this->_getPastOffers($this->_userid);
        $this->_getNumOfPastOffers($this->_userid);
        //all offers
        $this->_getOffers($this->_userid);
        
        /**
         * bookings
         */
        
        //render view 
        $this->view->render('dashboard/ride/ride-history', 'user_nav');
    }

    public function View_Offer_Details($rideid, $driverid, $ride_type)
    {
        $this->view->title = "Offer Details";
        $this->_getOffer($rideid,$driverid);
        $this->_getReturn($rideid);
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

    public function frmResults($from, $to)
    {
        $this->view->title = "Matching Results";
        $this->_search_Any($from, $to);
        $this->view->render('dashboard/ride/results', 'user_nav');
    }

    public function offerRide($driverid)
    {
        $this->model->offerRide($driverid);
    }

    public function postRideRequest($passengerid)
    {
        $this->model->postRideRequest($passengerid);
    }

    private function _getOffers($driverid)
    {
        $this->view->offers = $this->model->getOffers($driverid);
    }

    private function _getPastOffers($driverid)
    {
        $this->pastOffers = $this->model->getPastOffers($driverid);
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

    private function _search_Any($from, $to)
    {
        $this->view->res_any = $this->model->search_Any($from, $to);
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
    public function messages()
    {
        $this->view->title = "Messages";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/messages', 'user_nav');
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
            exit;
        } else if (!isset($session)) {
            header('location:' . URL . 'login');
            exit;
        }
    }
    public function logout()
    {
        Util::destroy_session();
        header('location:' . URL . 'login');
        exit;
    }
    #endregion
}