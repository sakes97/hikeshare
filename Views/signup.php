<?php
include("common/head.php");
include("common/basic_nav.php");
?>


<div class="row no-gutter"> <!--no-gutter removes the spacing between coloumns-->
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image" style="background-image:url('Views/img/fullcar-01_2x.jpg');"></div>
    <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-8 mx-auto">
                        <h3 class="login-heading mb-4">Welcome!</h3>
                        <button class="btn btn-lg btn-block btn-login text-uppercase font-weight-bold mb-2 btn-google"
                            type="submit">
                            <i class="fab fa-google m-1"></i>
                            Google Sign-up</button>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 btn-facebook"
                            type="submit">
                            <i class="fab fa-facebook-f p-1"></i>
                            Facebook Sign-up
                        </button>
                        <p class="lead text-center">Or</p>
                        <form method="POST" action="User_mdl">
                            <div class="form-label-group">
                                <input type="text" name="inputFname" id="inputFname" class="form-control" placeholder="Forename" required autofocus>
                                <label for="fname">First Name</label>
                            </div>
                            
                            <div class="form-label-group">
                                <input type="text" name="inputLname" id="inputLname" class="form-control" placeholder="Last Name" required autofocus>
                                <label for="lname">Last Name</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email Address" required autofocus>
                                <label for="inputEmail">Email Address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                type="submit">
                                Sign-up
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>