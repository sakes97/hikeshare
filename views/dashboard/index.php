<div class="section profile-content">
  <div class="container">    
    <div class="row max">
        <!-- USER PROFILE -->
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mr-auto shadow-sm p-3 mb-5 bg-white rounded">
          <div class="owner">
            <div class="avatar">
              <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($this->user['picture']);?>" alt="User Profile Picture" 
                    class="img-circle img-no-padding img-responsive img-circle">
            </div>
            <div class="name">
              <h4 class="title">
                <?php echo $this->user['firstname'] . ' ' . $this->user['lastname']; ?>
                <br />
              </h4>
            </div>
            <div class="row">
              <div class="col-md-12 ml-auto mr-auto text-center">
                <a class="btn btn-outline-default btn-round" href="#" id="edit_profile">Edit Profile <i class="fas fa-edit"></i></a>
              </div>
            </div>
          <!-- Member Short Information -->
           <div class="row">
              <div class="col-12">
                <div class="member-info-view">
                  <table class="table table-md table-stripped">
                    <tr>
                      <td style="text-align:left;">Member Since</td>
                      <td style="text-align:right;">June 8 2019</td>
                    </tr>
                    <tr>
                      <td style="text-align:left;">
                        Preferences 
                        <br>
                        <a id="edit_preferences" href="#">Edit Preferences<i class="fas fa-edit"></i></a>
                      </td>
                      <td style="text-align:right;">
                        <?php 
                            $smoking = $this->user['smoking_yn'];
                            $alcohol = $this->user['alcohol_yn'];
                            $pets = $this->user['pets_yn'];

                            //smoking preference
                            if($smoking == 'N'){
                              echo '<img class="img-responsive img-circle preference-img" alt="No Smoking" src="' . URL . 'public/images/icons/smoking/no-smoking.png" 
                              data-toggle="tooltip" data-placement="top" title="No Smoking Allowed"/>';
                            } else if($smoking == 'Y') {
                              echo '<img class="img-responsive img-circle preference-img" alt="Smoking allowed" src="' . URL . 'public/images/icons/smoking/smoking.png" 
                              data-toggle="tooltip" data-placement="top" title="Smoking Is Permitted"/>';
                            } else {
                              echo 'No smoking,';
                            }

                            //alchohol preference
                            if($alcohol == 'N'){
                              echo '<img class="img-responsive img-circle preference-img" alt="No Alcohol" src="' . URL . 'public/images/icons/alcohol/no-alcohol.png" 
                              data-toggle="tooltip" data-placement="top" title="No Drinking Is Allowed"/>';
                            } else if($alcohol == 'Y') {
                              echo '<img class="img-responsive img-circle preference-img" alt="Alcohol Allowed" src="' . URL . 'public/images/icons/alcohol/alcohol.png" 
                              data-toggle="tooltip" data-placement="top" title="Drinking Is Permitted" />';                              
                            } else {
                              echo 'No alcohol,';
                            }

                            //pets preference
                            if($pets == 'N'){
                              echo '<img class="img-responsive img-circle preference-img" alt="No Pets" src="' . URL . 'public/images/icons/pets/no-pets.jpg" 
                              data-toggle="tooltip" data-placement="top" title="No Pets Allowed" />';
                            } else if($pets == 'Y') {
                              echo '<img class="img-responsive img-circle preference-img" alt="Pets Allowed" src="' . URL . 'public/images/icons/pets/pets.jpg" 
                              data-toggle="tooltip" data-placement="top" title="Pets Are Allowed" />';                              
                            } else {
                              echo 'No pets';
                            }

                        ?>
                        
                      </td>
                    </tr>
                    
                  </table>
                </div>
              </div>
           </div>
          <!-- Verification -->
            <div class="row">

            </div>
          </div>
        </div>


        <!-- USER DASHBOARD DISPLAY VIEW -->
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 ml-auto shadow-sm p-3 mb-5 bg-white rounded">
          <!-- NAVIGATION PANE -->
          <div class="row max">
            <div class="col-12">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <ul class="nav nav-tabs" id="nav-menu" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="t_home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" id="t_messages">Messages</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" id="t_reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" id="t_ride_history">Ride History</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" id="t_preferences">Preferences</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" id="t_account">Account</a>
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
              <!-- PREFERENCES --> 
              <div id="dash_preferences" class="col-12 out">
                <h5>dashboard > preferences</h5>
              </div>
              <!-- ACCOUNT --> 
              <div id="dash_account" class="col-12 out">
                <h3 class="display-5">Profile Settings</h3>
              </div>
            </div>
          </div>

        </div>

    </div>

  </div><!-- end container -->
</div><!-- end section -->