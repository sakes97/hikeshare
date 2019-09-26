<?php 

$option = $_GET['profile_view'];

if(!isset($_GET['profile_view'])){
  $option = 2;
}

?>
<div class="section profile-content">
  <div class="container">
    <h2>Profile</h2>
    <!-- select view -->
    <div class="row">
      <div class="col-xs-4 col-md-3">
        <select name="profile_view" class="form-control form-control-sm"
        id="profile_view" onchange="pageview(this.value)">
          <option value="0" <?php if($option == 0) echo "selected"; ?> >Profile Picture</option>
          <option value="1" <?php if($option == 1) echo "selected"; ?> >Preferences</option>
          <option value="2" <?php if($option == 2) echo "selected"; ?> >User Details</option>
        </select>
      </div>
    </div>
    <br/>
    <!-- end select view -->

    <!-- profile-section -->
    <div class="profile-section py-1 mb-1 shadow-sm">
      
      <?php
        if($option == 0){
      ?>

      <!-- profile picture -->
      <div class="row">
        <div class="col-12">
          <h6 class="mt-2 pb-0 text-center">Your profile picture</h6>
          <form>
            <!-- image -->
            <div class="form-row">
              <div class="form-group col-md-4 mr-auto ml-auto">
                <div class="owner">
                  <div class="avatar">
                    <img id="image-upload" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($this->user['picture']);?>"
                      alt="User Profile Picture" class="img-circle img-no-padding img-responsive">
                  </div>
                </div>
              </div>
            </div>
            <!-- end image -->
            <!-- upload button -->
            <div class="form-row">
              <div class="form-group col-5 ml-auto mr-auto">
                <input type="file" id="inputGroupFile01" class="form-control imgInp custom-file-input" 
                aria-describedby="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
              </div>
            </div>
            <!-- end upload button -->
          </form>
        </div>
      </div>
      <!-- end profile picture-->

      <?php
        } else if ($option == 1) {
      ?>

      <!-- preferences-->
      <div class="row">
        <div class="col-12 text-center">
          <h6 class="mt-2 pb-0">Preferences</h6>
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
      <!-- end preferences-->

      <?php 
        } else if ($option == 2) {
      ?>

      <!-- user details -->
      <div class="row">
        <div class="col-12">
          <h6 class="mt-2 pb-0 text-center">User Details</h6>
          <!-- user details form -->
          <form method="post" action="<?php echo URL; ?>dashboard/updateUserDetails/<?php echo $this->user['userid'];?>">
              <!-- firstname/lastname/email -->
              <div class="form-row">
                <div class="form-group col-sm-6 col-md-4 p-3">
                  <label for="firstname">Firstname</label>
                  <input type="text" class="form-control" id="firstname" nam="firstname" placeholder="Firstname">
                </div>
                <div class="form-group col-sm-6 col-md-4 p-3">
                  <label for="lastname">Lastname</label>
                  <input type="text" class="form-control" id="lastname" nam="lastname" placeholder="Lastname">
                </div>
                <div class="form-group col-md-4 p-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
              </div>
              <!-- end firstname/lastname/email -->

              <!-- contact number -->
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-4 p-3">
                  <label for="contact_num" class="label-control">Contact Number</label>
                  <input type="text" class="form-control" id="contact_num" name="contact_num" placeholder="Contact Number">
                </div>
              </div>
              <!-- end number-->

              <!-- bio/gender -->
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-6 p-3">
                  <label for="bio">Short Bio</label>
                  <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-6 p-3">
                  <label for="gender">Gender</label>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="female_option" name="gender" value="female">
                    <label class="custom-control-label" for="female_option">Female</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="male_option" name="gender" value="male">
                    <label class="custom-control-label" for="male_option">Male</label>
                  </div>

                </div>
              </div>
              <!-- end bio/gender -->

              <!-- date of birth-->
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-4 p-3">
                  <label class="label-control" for="dob">Date of Birth</label>
                  <input type="text" class="form-control datepicker" name="dob" id="dob" placeholder=""/>
                </div>
              </div>
              <!-- end date of birth-->


              <!-- password -->
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-4 p-3">
                  <label class="label-control" for="inputPassword">Password</label>
                  <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                </div>
                <!-- <div class="form-group col-sm-12 col-md-4 p-3">
                  <label class="label-control" for="inputConfirmPassword">Confirm Password</label>
                  <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password">
                </div> -->
              </div>
              <!-- end password-->

          
              <!-- button -->
              <div class="text-center pb-3">
                <input type="submit" class="btn btn-danger btn-round" value="submit">
              </div>
              <!-- end button -->

          </form>
          <!-- end user details form --> 
        </div>

      </div>
      <!-- end user details-->

      <?php 
        }
      ?>

      
    </div>
    <!-- end profile section -->
  </div>
</div>