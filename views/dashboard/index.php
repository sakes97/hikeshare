<div class="section profile-content">
  <div class="container">    
    <div class="row max">
        <!-- USER PROFILE -->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mr-auto">
          <div class="owner">
            <div class="avatar">
              <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($this->user['picture']);?>" alt="User Profile Picture" 
                    class="img-circle img-no-padding img-responsive">
            </div>
            <div class="name">
              <h4 class="title">
                <?php echo $this->user['firstname'] . ' ' . $this->user['lastname']; ?>
                <br />
              </h4>
            </div>
            <div class="row">
              <div class="col-md-12 ml-auto mr-auto text-center">
                <button class="btn btn-outline-default btn-round">Edit Profile <i class="fas fa-edit"></i></button>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-12 text-center">
                <ul id="nav-menu">
                  <li><a data-page="1" href="#">Home</a></li>
                  <li><a data-page="2" href="#">Messages</a></li>
                  <li><a data-page="3" href="#">Reviews</a></li>
                  <li><a data-page="4" href="#">History</a></li>
                  <li><a data-page="5" href="#">Account</a></li>
                </ul>
              </div>
            </div> -->
          </div>
        </div>


        <!-- USER DASHBOARD DISPLAY VIEW -->
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 ml-auto">
          <!-- NAVIGATION PANE -->
          <div class="row max">
            <div class="col-12">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <ul class="nav nav-tabs" id="nav-menu" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages">Messages</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#ride">Ride History</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#account">Account</a>
                    </li>
                  </ul>
                </div>


              </div>
            </div>
          </div>
          <!-- DISPLAY VIEW -->
          <div class="row max">
            <div id="display-content">
              <!-- HOME -->
              <div id="dash_home" class="col-12 show">
                <a class="btn btn-outline-danger btn-round" href="#">Offer a ride</a>
                <a class="btn btn-outline-danger btn-round" href="#">Find a ride</a>
              </div>
              <!-- MESSAGES --> 
              <div id="dash_messages" class="col-12 out">
                <h5>dashboard > messages</h5>
              </div>
              <!-- REVIEWS --> 
              <div id="dash_reviews" class="col-12 out">
                <h5>dashboard > reviews</h5>
              </div>
              <!-- RIDE HISTORY --> 
              <div id="dash_ride_history" class="col-12 out">
                <h5>dashboard > ride history</h5>
              </div>
              <!-- ACCOUNT --> 
              <div id="dash_account" class="col-12 out">
                <h5>dashboard > account</h5>
              </div>
            </div>
          </div>

        </div>

    </div>

  </div><!-- end container -->
</div><!-- end section -->