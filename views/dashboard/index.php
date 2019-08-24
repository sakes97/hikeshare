<div class="section profile-content">
  <div class="container">    
    <div class="row max">
      <!-- USER PROFILE AND NAVIGATION PANE -->
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
              <ul id="owner-sidebar">
                <li><a href="#">Home</a></li>
                <li><a href="#">Notifications(0)</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Account</a></li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>


    <!-- USER DASHBOARD DISPLAY VIEW -->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 ml-auto">
      <div class="nav-tabs-navigation">
        
        <div class="nav-tabs-wrapper">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#" role="tab">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#" role="tab">Notifications</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#" role="tab">Messages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#" role="tab">Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#" role="tab">Ride History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#" role="tab">Account</a>
            </li>
          </ul>
        </div>


      </div>

    </div>

    </div>










  </div><!-- end container -->
</div><!-- end section -->
