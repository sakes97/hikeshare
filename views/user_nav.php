<?php   
    Util::init_session();
    $session = Util::get_session('loggedin');
?>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="#" rel="tooltip" title="hikeshare - ridesharing community">Logo</a>
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
                    <a class="nav-link" href="#">
                        Find a ride
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Offer a ride
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Messages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Ride history
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        User settings
                    </a>
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