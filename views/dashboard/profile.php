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
            <div class="col-xs-4 col-md-3 pt-1 mb-1">
                <select name="profile_view" class="form-control form-control-sm" id="profile_view"
                    onchange="pageview(this.value)">
                    <option value="0" <?php if($option == 0) echo "selected"; ?>>Profile Picture</option>
                    <option value="1" <?php if($option == 1) echo "selected"; ?>>Preferences</option>
                    <option value="2" <?php if($option == 2) echo "selected"; ?>>User Details</option>
                </select>
            </div>
            <div class="col-xs-12 col-md-3">
                <a class="btn btn-danger btn-square"
                    href="<?php echo URL; ?>dashboard/disableAccount/<?php echo $this->user['userid']; ?>">
                    Delete Account
                </a>
            </div>
        </div>
        <br />
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
                    <form id="frmPicture" method="post"
                        action="<?php echo URL;?>dashboard/updateProfilePicture/<?php echo $this->user['userid']; ?>"
                        enctype="multipart/form-data">
                        <!-- image -->
                        <div class="form-row">
                            <div class="form-group col-md-4 mr-auto ml-auto">
                                <div class="owner">
                                    <div class="avatar">
                                        <img id="image-upload"
                                            src="<?php echo 'data:image/jpeg;base64,'.base64_encode($this->user['picture']);?>"
                                            alt="User Profile Picture" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end image -->
                        <!-- choose button -->
                        <div class="form-row">
                            <div class="form-group col-5 ml-auto mr-auto">
                                <input type="file" id="inputGroupFile01" class="form-control imgInp custom-file-input"
                                    aria-describedby="inputGroupFile01" name="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                            </div>
                        </div>
                        <!-- end choose button -->

                        <!-- upload button -->
                        <div class="text-center pb-3">
                            <input form="frmPicture" type="submit" class="btn btn-outline-danger btn-round"
                                value="Upload">
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
                </div>

                <form method="post" class="mx-auto"
                    action="<?php echo URL; ?>dashboard/updatePreferences/<?php echo $this->user['userid']; ?>">

                    <div class="form-row">
                        <!-- alcohol -->
                        <div class="form-group p-3">
                            <label for="alcohol_yn">Alcohol (y/n)</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="alcohol_y" name="alcohol_yn"
                                    value="Y" <?php 
                                      if($this->user['alcohol_yn']=='Y'){
                                        echo "checked='Checked'";
                                      }
                                    ?>>
                                <label class="custom-control-label" for="alcohol_y">Alcohol Allowed</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="alcohol_n" name="alcohol_yn"
                                    value="N" <?php 
                                      if($this->user['alcohol_yn']=='N'){
                                        echo "checked='Checked'";
                                      }
                                    ?>>
                                <label class="custom-control-label" for="alcohol_n">No Alcohol Allowed</label>
                            </div>
                        </div>
                        <!-- end alcohol -->
                        <!-- pets -->
                        <div class="form-group p-3">
                            <label for="pets_yn">Pets (y/n)</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="pets_y" name="pets_yn" value="Y" <?php 
                                      if($this->user['pets_yn']=='Y'){
                                        echo "checked='Checked'";
                                      }
                                    ?>>
                                <label class="custom-control-label" for="pets_y">Pet Allowed</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="pets_n" name="pets_yn" value="N" <?php 
                                      if($this->user['pets_yn']=='N'){
                                        echo "checked='Checked'";
                                      }
                                    ?>>
                                <label class="custom-control-label" for="pets_n">No Pets Allowed</label>
                            </div>
                        </div>
                        <!-- end pets -->
                        <!-- smoking -->
                        <div class="form-group p-3">
                            <label for="smoking_yn">Smoking (y/n)</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="smoking_y" name="smoking_yn"
                                    value="Y" <?php 
                                      if($this->user['smoking_yn']=='Y'){
                                        echo "checked='Checked'";
                                      }
                                    ?>>
                                <label class="custom-control-label" for="smoking_y">Smoking Allowed</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="smoking_n" name="smoking_yn"
                                    value="N" <?php 
                                      if($this->user['smoking_yn']=='N'){
                                        echo "checked='Checked'";
                                      }
                                    ?>>
                                <label class="custom-control-label" for="smoking_n">No Smoking Allowed</label>
                            </div>
                        </div>
                        <!-- end smoking -->
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-outline-danger btn-round">Update Preferences</button>
                    </div>
                </form>


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
                    <form method="post"
                        action="<?php echo URL; ?>dashboard/updateProfileDetails/<?php echo $this->user['userid'];?>">
                        <!-- firstname/lastname/email -->
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-4 p-3">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    placeholder="Firstname..." value="<?php echo $this->user['firstname']; ?>">
                            </div>
                            <div class="form-group col-sm-6 col-md-4 p-3">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    placeholder="Lastname..." value="<?php echo $this->user['lastname']; ?>">
                            </div>
                            <div class="form-group col-md-4 p-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email Address..." value="<?php echo $this->user['email']; ?>">
                            </div>
                        </div>
                        <!-- end firstname/lastname/email -->

                        <!-- contact number -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-4 p-3">
                                <label for="contact_num" class="label-control">Contact Number</label>
                                <input type="text" class="form-control" id="contact_num" name="contact_num"
                                    placeholder="Contact Number..." value="<?php echo $this->user['contact_num']; ?>">
                            </div>
                        </div>
                        <!-- end number-->

                        <!-- bio/gender -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-6 p-3">
                                <label for="bio">Short Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3"
                                    placeholder="Short Descriptive Bio..."><?php
                                        if($this->user['bio'] != NULL || isset($this->user['bio'])){
                                            echo $this->user['bio'];
                                        }
                                     ?></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 p-3">
                                <label for="gender">Gender</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="female_option" name="gender"
                                        value="female" <?php
                                            if($this->user['gender'] == "female"){
                                                echo "checked=checked";
                                            }
                                        ?>>
                                    <label class="custom-control-label" for="female_option">Female</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="male_option" name="gender"
                                        value="male" <?php
                                            if($this->user['gender'] == "male"){
                                                echo "checked=checked";
                                            }
                                        ?>>
                                    <label class="custom-control-label" for="male_option">Male</label>
                                </div>

                            </div>
                        </div>
                        <!-- end bio/gender -->

                        <!-- date of birth-->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-4 p-3">
                                <label class="label-control" for="dob">Date of Birth</label>
                                <input type="text" class="form-control datepicker" name="dob" id="dob" placeholder=""
                                    value="<?php echo $this->user['dob'];?>" />
                            </div>
                        </div>
                        <!-- end date of birth-->


                        <!-- password -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-4 p-3">
                                <label class="label-control" for="inputPassword">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="inputPassword"
                                    placeholder="Password" value="<?php echo $this->user['password']; ?>">
                            </div>
                        </div>
                        <!-- end password-->


                        <!-- button -->
                        <div class="text-center pb-3">
                            <input type="submit" class="btn btn-outline-danger btn-round" value="submit">
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