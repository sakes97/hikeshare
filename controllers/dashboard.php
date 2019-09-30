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
            'dashboard/js/dashboard.js',
        );
    }
    #region Index
    public function index()
    {
        $this->view->title = "Dashboard";
        $this->_getUserDetails($this->_userid);
        $this->getNumOfPendingOffers($this->_userid);
        $this->_getPendingOffers($this->_userid);
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
        $this->getDays();
        $this->_getCars($this->_userid);
        $this->_getNumCars($this->_userid);
        $this->view->render('dashboard/ride/offer', 'user_nav');
    }

    public function find_Ride()
    {
        $this->view->title = "Create Alert";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/ride/lift', 'user_nav');
    }

    public function view_PastRide()
    {
        $this->view->title = "Past Rides";
        $this->_getUserDetails($this->_userid);
        $this->_getOffers($this->_userid);
        $this->view->render('dashboard/ride/view-past-rides', 'user_nav');
    }

    public function view_UpcomingRide()
    {
        $this->view->title = "Upcoming Rides";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/ride/view-upcoming-ride', 'user_nav');
    }

    public function offerRide($driverid)
    {
        $this->model->offerRide($driverid);
    }

    private function _getOffers($driverid)
    {
        $this->view->offers = $this->model->getOffers($driverid);
    }
    
    private function _getPendingOffers($driverid)
    {
        $this->view->pendingOffers = $this->model->getPendingOffers($driverid);
    }
    
    public function getDays()
    {
        $this->view->days = $this->model->getDays();
    }
    public function getNumOfPendingOffers($driverid)
    {
        $this->view->NUM_OF_PENDING_OFFERS = $this->model->getNumOfPendingOffers($driverid); 
    }
    public function getTripSchedule($rideid)
    {
        $this->model->getTripSchedule($rideid);
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
}
#endregion
