<div class="section profile-content">
  <div class="container">
    <h2>Profile</h2>
    <div class="profile-section py-1 mb-1 shadow-sm">
      <!-- profile picture -->
      <div class="row">
        <div class="col-12 text-center">
          <h6>Your profile picture</h6>
          <div class="owner">
            <div class="avatar">
              <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($this->user['picture']);?>"
                alt="User Profile Picture" class="img-circle img-no-padding img-responsive img-circle">
                <br/>
                <button class="btn btn-danger btn-round">Upload Image</button>
            </div>
          </div>
        </div>
      </div>
      <hr/>
      <!-- end profile picture-->

      <!-- preferences-->
      <div class="row">
        <div class="col-12 text-center">
          <h6>Preferences</h6>
          <p class="lead">Click on the icon to select preference</p>
        </div>
        
        <!-- smoking -->
        <div class="col-12 text-center">
            <img class="img-responsive img-circle preference-img" 
            alt="No Smoking" src="<?php echo URL; ?>public/images/icons/smoking/no-smoking.png"
            data-toggle="tooltip" data-placement="top" title="No Smoking Allowed"/>
            <img class="img-responsive img-circle preference-img" 
            alt="No Smoking" src="<?php echo URL; ?>public/images/icons/smoking/smoking.png"
            data-toggle="tooltip" data-placement="top" title="Smoking Is Permitted"/>
        </div>
        <!-- end smoking -->

        <!-- alcohol -->
        <div class="col-12 text-center">
            <img class="img-responsive img-circle preference-img" 
            alt="No Smoking" src="<?php echo URL; ?>public/images/icons/alcohol/no-alcohol.png"
            data-toggle="tooltip" data-placement="top" title="No Drinking Is Allowed"/>
            <img class="img-responsive img-circle preference-img" 
            alt="No Smoking" src="<?php echo URL; ?>public/images/icons/alcohol/alcohol.png"
            data-toggle="tooltip" data-placement="top" title="Drinking Is Permitted"/>
        </div>
        <!-- end alcohol -->

        <!-- pets -->
        <div class="col-12 text-center">
            <img class="img-responsive img-circle preference-img" 
            alt="No Smoking" src="<?php echo URL; ?>public/images/icons/pets/no-pets.jpg"
            data-toggle="tooltip" data-placement="top" title="No Pets Allowed"/>
            <img class="img-responsive img-circle preference-img" 
            alt="No Smoking" src="<?php echo URL; ?>public/images/icons/pets/pets.jpg"
            data-toggle="tooltip" data-placement="top" title="Pets Are Allowed"/>
        </div>
        <!-- end pets -->

        <div class="col-12 text-center">
          <button class="btn btn-danger btn-round">Set Preferences</button>
        </div>
      </div>
      <hr/>
      <!-- end preferences-->


      <!-- user details -->
      <div class="row">
        <div class="col-12">
          <h6 class="text-center">User Details</h6>
          <form>
              <!-- firstname/lastname/email -->
              <div class="form-row">
                <div class="form-group col-sm-6 col-md-4 p-3">
                  <label for="inputFirstname">Firstname</label>
                  <input type="text" class="form-control" id="inputFirstname" nam="inputFirstname" placeholder="Firstname">
                </div>
                <div class="form-group col-sm-6 col-md-4 p-3">
                  <label for="inputLastname">Lastname</label>
                  <input type="text" class="form-control" id="inputLastname" nam="inputLastname" placeholder="Lastname">
                </div>
                <div class="form-group col-md-4 p-3">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmai" name="inputEmail" placeholder="Email">
                </div>
              </div>
              <!-- end firstname/lastname/email -->

              <!-- contact number -->
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-4 p-3">
                  <label for="inputContactNumber" class="label-control">Contact Number</label>
                  <input type="text" class="form-control" id="inputContactNumber" name="inputContactNumber" placeholder="Contact Number">
                </div>
              </div>
              <!-- end number-->

              <!-- bio/gender -->
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-6 p-3">
                  <label for="inputBio">Short Bio</label>
                  <textarea class="form-control" id="inputBio" name="inputBio" rows="3"></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-6 p-3">
                  <label for="inputGender">Gender</label>
                  <div class="form-check-radio">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="inputGender" id="inputFemale" 
                      value="female">
                      Female
                      <span class="form-check-sign"></span>
                    </label>
                  </div>
                  <div class="form-check-radio">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="inputGender" id="inputMale" 
                      value="Male">
                      Male
                      <span class="form-check-sign"></span>
                    </label>
                  </div>
                </div>
              </div>
              <!-- end bio/gender -->

              <!-- date of birth-->
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-6 p-3">
                  <label class="label-control" for="inputBirth">Date of Birth</label>
                  <input type="text" class="form-control datetimepicker" placeholder=""/>
                </div>
              </div>
              <!-- end date of birth-->


              <!-- password -->
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-6 p-3">
                  <label class="label-control" for="inputPassword">Password</label>
                  <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                </div>
                <div class="form-group col-sm-12 col-md-6 p-3">
                  <label class="label-control" for="inputConfirmPassword">Confirm Password</label>
                  <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password">
                </div>
              </div>
              <!-- end password-->

          
              <!-- button -->
              <div class="text-center pb-3">
                <input type="submit" class="btn btn-danger btn-round" value="submit">
              </div>
              <!-- end button -->

            </form>
        </div>

      </div>
      <!-- end user details-->

      <!-- verifications -->
      <!-- end verifications -->
    </div>
  </div>
</div>