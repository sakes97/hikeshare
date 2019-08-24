<div class="section profile-content">
  <div class="container">    
    <div class="row max">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mr-auto">
        <div class="owner">
          <div class="avatar">
            <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($this->user['picture']);?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
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
          <div class="row">
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
          </div>
        </div>
      </div>
    </div>










  </div><!-- end container -->
</div><!-- end section -->
