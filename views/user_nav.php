<?php   
    Util::init_session();
    $session = Util::get_session('loggedin');
    if(isset($session)){
        if($session['online'] === true){

?>
<nav class="navbar navbar-expand-lg fixed-top bg-danger">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="<?php echo URL; ?>dashboard" rel="tooltip" title="hikeshare - ridesharing community">hikeshare</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#usernav" aria-label="Toggle Navigation"
                aria-controls="usernav" aria-expanded="false">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="usernav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>dashboard">
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="ridesDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rides
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="ridesDropdown">
                        <a class="dropdown-item" href="<?php echo URL; ?>dashboard/offer_Ride">Offer Ride</a>
                        <a class="dropdown-item" href="<?php echo URL;?>dashboard/frmPostRequest">Request Ride</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo URL; ?>dashboard/View_Ride_History">View Ride History</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>dashboard/frmMessages/<?php echo $session['userid'];?>?view=conv-all">
                        Messages
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" 
                    aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu dropdown-default" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="<?php echo URL;?>dashboard/profile">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo URL;?>dashboard/add_car">Add Car</a>
                        <a class="dropdown-item" href="<?php echo URL;?>dashboard/viewCars">View Cars</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>dashboard/logout">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
        }
    }
?>
