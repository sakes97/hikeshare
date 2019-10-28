<nav class="navbar navbar-expand-lg fixed-top" color-on-scroll="300">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="index" rel="tooltip" title="hikeshare - ridesharing community">
                hikeshare
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarnav" aria-label="Toggle Navigation"
                aria-controls="navbarnav" aria-expanded="false">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarnav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>register">
                        Register
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="page-header" style="background-image: url('<?php echo URL; ?>public/images/city_matched_2x.jpg');">
    <div class="filter"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 ml-auto mr-auto">
          <div class="card card-register">
            <h2 class="title mx-auto">Welcome</h2>
            <form class="register-form" method="POST" action="<?php echo URL;?>login/signin" id="loginForm">
              <label>Email</label>
              <input type="text" class="form-control" name="input_username" placeholder="Email">
              <label>Password</label>
              <input type="password" class="form-control" name="input_password" placeholder="Password">
              <!-- <button type="submit" class="btn btn-danger btn-block btn-round">Login</button> -->
              <input type="submit" class="btn btn-danger btn-block btn-round" value="Login">
            </form>
          </div>
        </div>
      </div>
    </div>
</div>