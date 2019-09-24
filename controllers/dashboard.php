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
    #endregion

    #region Ride
    public function offerRide()
    {
        $this->view->title = "Add a Journey";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/ride/offer', 'user_nav');
    }

    public function findRide()
    {
        $this->view->title = "Create Alert";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/ride/lift', 'user_nav');
    }

    public function viewPastRide()
    {
        $this->view->title = "Past Rides";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/ride/view-past-ride', 'user_nav');
    }

    public function viewUpcomingRide()
    {
        $this->view->title = "Upcoming Rides";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/ride/view-upcoming-ride', 'user_nav');
    }
    #endregion

    #region Reviews
    public function reviewRides()
    {
        $this->view->title = "Review Past Rides";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/reviews/review-ride', 'user_nav');
    }
    public function viewPastReviews()
    {
        $this->view->title = "View Past Reviews";
        $this->_getUserDetails($this->_userid);
        $this->view->render('dashboard/reviews/past-reviews', 'user_nav');
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
        $this->view->render('dashboard/car/view-cars','user_nav');

    }

    /**
     * Renders Add Car Page
     */
    public function add_car()
    {
        $this->view->title = "Add Car";
        $this->_getUserDetails($this->_userid);
        $this->_getNumCars($this->_userid);
        $this->view->render('dashboard/car/add-car','user_nav');
    }

    /**
     * Renders Update Car Page 
     */
    public function update_Car($carid)
    {
        $this->view->title = "Update Car";
        $this->_getUserDetails($this->_userid);
        $this->_getCar($carid,$this->_userid);
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

    private function _getCar($carid,$driverid)
    {
        $this->view->myCar = $this->model->getCar($carid,$driverid);
    }

    /**
     * Adds user car to the database
     */
    public function addCar()
    {
        $this->model->addCar();
    }
    /**
     * Updates users car 
     */
    public function updateCar($carid)
    {
        $this->model->updateCar($carid);
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
}
#endregion
