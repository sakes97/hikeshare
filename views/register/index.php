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
                    <a class="nav-link" href="<?php echo URL; ?>login">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="page-header" style="background-image: url('<?php echo URL; ?>public/images/maxresdefault.jpg');">
    <div class="filter"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 ml-auto mr-auto">
          <div class="card card-register">
            <h3 class="title mx-auto">Welcome</h3>
            <div class="social-line text-center">
              <a href="<?php echo URL; ?>register/register_facebook" class="btn btn-neutral btn-facebook btn-just-icon">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a href="<?php echo URL; ?>register/register_google" class="btn btn-neutral btn-google btn-just-icon">
                <i class="fab fa-google-plus-g"></i>
              </a>
              <a href="<?php echo URL; ?>register/register_google" class="btn btn-neutral btn-twitter btn-just-icon">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
            <form class="register-form" method="post" action="register/register_standard">
              <label>Firstname</label>
              <input type="text" name="inputFname" class="form-control" placeholder="Firstname" required>
              <label>Lastname</label>
              <input type="text" name="inputLname" class="form-control" placeholder="Lastname" required>
              <label>Email</label>
              <input type="text" name="inputEmail"  class="form-control" placeholder="Email" required>
              <label>Password</label>
              <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
              <button class="btn btn-danger btn-block btn-round">Register</button>
            </form>
            <div class="forgot">
              <a href="#" class="btn btn-link btn-danger">Forgot password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>