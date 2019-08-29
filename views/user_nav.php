<?php   
    Util::init_session();
    $session = Util::get_session('loggedin');
    if(isset($session)){
        if($session['online'] === true){

?>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="dashboard" rel="tooltip" title="hikeshare - ridesharing community">hikeshare</a>
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
                    <a class="nav-link" href="dashboard">
                        Home
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
                        <i class="fas fa-envelope"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Account
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

<?php
        }
    }
?>
