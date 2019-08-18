<?php   Session::init();     ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#usernav" aria-label="Toggle Navigation"
            aria-controls="usernav" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="usernav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <?php
                            if(isset($_COOKIE['user_id'])){
                                echo $this->user['firstname'];
                            } else {
                                echo "User > Home";
                            }
                        ?>
                    </a>
                </li>
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
                    <a class="nav-link" href="dashboard/logout">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>