<div class="page-header" style="background-image: url('<?php echo URL; ?>public/images/city_matched_2x.jpg');">
    <div class="filter"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 ml-auto mr-auto">
          <div class="card card-register">
            <h3 class="title mx-auto">Welcome</h3>
            <div class="social-line text-center">
              <a href="<?php echo URL; ?>register/register_facebook" class="btn btn-neutral btn-facebook btn-just-icon">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="<?php echo URL; ?>register/register_google" class="btn btn-neutral btn-google btn-just-icon">
                <i class="fa fa-google-plus"></i>
              </a>
              <a href="<?php echo URL; ?>register/register_google" class="btn btn-neutral btn-twitter btn-just-icon">
                <i class="fa fa-twitter"></i>
              </a>
            </div>
            <form class="register-form" method="post" action="login/signin">
              <label>Email</label>
              <input type="text" class="form-control" name="input_username" placeholder="Email">
              <label>Password</label>
              <input type="password" class="form-control" name="input_password" placeholder="Password">
              <button class="btn btn-danger btn-block btn-round">Login</button>
            </form>
            <div class="forgot">
              <a href="#" class="btn btn-link btn-danger">Forgot password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>