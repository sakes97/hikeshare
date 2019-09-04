<div class="section profile-content">
    <div class="container bg-white shadow-sm pb-2">
      <div class="row">
        <!-- owner -->
        <div class="col-sm-12 col-lg-4 text-center">
          <div class="owner">
            <div class="avatar">
              <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($this->user['picture']);?>" alt="User Profile Picture" 
                    class="img-circle img-no-padding img-responsive img-circle">
            </div>
          </div>
          <div class="name">
            <h4 class="title">
              <?php echo $this->user['firstname'] . ' ' . $this->user['lastname']; ?>
              <br />
            </h4>
            <a class="btn btn-outline-default btn-round" href="#" id="edit_profile">Edit Profile <i class="fas fa-edit"></i></a>
          </div>
          <div class="member-info-view text-center mr-auto ml-auto ">
            <table class="table table-sm table-hover">
                <tr>
                  <td>Member Since</td>
                  <td>June 8 2019</td>
                </tr>
                <tr>
                  <td>
                    Preferences 
                    <br>
                    <a id="edit_preferences" href="#">Edit Preferences<i class="fas fa-edit"></i></a>
                  </td>
                  <td>
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
        <!-- end owner -->

        <!-- ride cards -->
        <div class="col-sm-12 col-lg-8 text-center mr-auto ml-auto ">
          <div class="row max mt-3">
            <!-- offer a ride -->
            <div class="col-xs-12 col-md-6">
              <div class="card card-ride text-center">
                <div class="card-body">
                  <h6 class="card-title font-weight-bold mb-2">Own a car?</h6>
                  <hr/>
                  <p class="card-text lead">
                    Post a lift offer to members part of our community who are 
                    going the same way and set and share the costs for your travels
                  </p>
                  <a href="<?php echo URL; ?>dashboard/offerRide" 
                    class="btn btn-outline-danger btn-round">
                    OFFER A RIDE
                  </a>
                </div>
              </div>
            </div>
            <!-- find a ride -->
            <div class="col-xs-12 col-md-6">
              <div class="card card-ride text-center">
                <div class="card-body">
                  <h6 class="card-title font-weight-bold mb-2">Need a ride?</h6>
                  <hr/>
                  <p class="card-text lead">
                    Going somewhere and need a ride? Post a request and allow members driving
                    to the same destination to find you. You can share the costs for the trip 
                    and travel in comfort
                  </p>
                  <a href="<?php echo URL; ?>dashboard/findRide"
                    class="btn btn-outline-danger btn-round">
                    FIND A RIDE
                  </a>
                </div>
              </div> 
            </div>
          </div>
        </div>
        <!-- end cards -->
      </div>

    </div>
</div>
