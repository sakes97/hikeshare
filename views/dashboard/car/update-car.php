<div class="section profile-content">
    <div class="container">
        <div class="profile-section py-1 mb-1 shadow-sm">
            <h2>Update Car</h2>

            <!--large screens-->
            <div class="row">
                <!-- Car Details-->
                <div class="col-md-6 d-none d-md-block">
                    <h6 class="mt-2 pb-0 text-center">Car Details</h6>
                    <form method="post" action="<?php echo URL; ?>dashboard/updateCar/<?php echo $this->myCar['carid']; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="driverid" id="driverid" value="<?php echo $this->user['userid']; ?>">
                        <!-- registration number -->
                        <div class="form-row">
                            <div class="form-group col-9 mr-auto ml-auto">
                                <label for="registration_number">Registration Number</label>
                                <input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="Registration Number" value="<?php echo $this->myCar['reg_num']; ?>">
                            </div>
                        </div>
                        <!-- end registration number -->

                        <!-- make/model/model-year -->
                        <div class="form-row">
                            <div class="form-group col-9 mr-auto ml-auto">
                                <label for="make">Make</label>
                                <input name="make" id="make" class="form-control" type="text" placeholder="Make" value="<?php echo $this->myCar['make']; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-9 mr-auto ml-auto">
                                <label for="model">Model</label>
                                <input type="text" class="form-control" name="model" id="model" placeholder="Model" value="<?php echo $this->myCar['model']; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-9 mr-auto ml-auto">
                                <label for="model_year" class="label-control">Model Year</label>
                                <input type="text" class="form-control datepicker_year" name="model_year" id="model_year" placeholder="Model Year" value="<?php echo $this->myCar['model_year']; ?>">
                            </div>
                        </div>
                        <!-- end make/model/model-year -->

                        <!-- colour -->
                        <div class="form-row">
                            <div class="form-group col-9 mr-auto ml-auto">
                                <label for="color">Color</label>
                                <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="<?php echo $this->myCar['color']; ?>">
                            </div>
                        </div>
                        <!-- end colour -->

                        <!-- number of seats -->
                        <div class="form-row">
                            <div class="form-group col-9 mr-auto ml-auto">
                                <label for="number_of_seats">Number Of Seats (Excluding Driver Seat)</label>
                                <input class="form-control" type="number" min="1" max="16" name="number_of_seats" id="number_of_seats" placeholder="1" value="<?php echo $this->myCar['seats']; ?>">
                            </div>
                        </div>
                        <!-- end number of seats -->

                        <!-- button -->
                        <div class="text-center pb-3">
                            <input type="submit" class="btn btn-danger btn-round" value="Update">
                        </div>
                        <!-- end button -->
                    </form>
                </div>
                <!-- Car Image-->
                <div class="col-md-6 border-left  d-none d-md-block">
                    <form id="frmPicture" method="post" 
                    action="<?php echo URL; ?>dashboard/updateCarImage/<?php echo $this->myCar['carid'];?>/<?php echo $this->myCar['driverid'];?>" 
                    enctype="multipart/form-data">
                        <!-- car image -->
                        <div class="form-row">
                            <div class="form-group col-12 p-3 mr-auto ml-auto text-center">
                                <label for="image-upload">Upload Car Image</label>
                                <div id="image_contain">
                                    <?php
                                    if (empty($this->myCar['car_image']) || $this->myCar['car_image'] == NULL) {
                                        ?>
                                        <img id="image-upload" align="middle" class="img-square img-no-padding img-responsive" src="<?php echo URL; ?>public/images/hikeshare-logo.png" alt="Car Image" title='' />

                                    <?php
                                    } else if (isset($this->myCar['car_image'])) {
                                        ?>
                                        <img id="image-upload" align="middle" class="img-square img-no-padding img-responsive" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($this->myCar['car_image']); ?>" alt="Car Image" title='' />
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-10 mx-auto">
                                <input type="file" id="inputGroupFile01" class="form-control imgInp custom-file-input" aria-describedby="inputGroupFile01" name="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 mr-auto ml-auto text-center">
                                <input form="frmPicture" type="submit" class="btn btn-danger btn-round" value="Upload">
                            </div>
                        </div>
                        <!-- end car image -->
                    </form>
                </div>
            </div>

            <!--small screens-->
            <div class="row d-sm-block d-md-none">
                <div class="col-12">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul id="tabs" class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#carImg" data-toggle="tab">Image</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#carDetails" data-toggle="tab">Details</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="car-tab-content" class="tab-content">
                        <!--image-->
                        <div class="tab-pane active" id="carImg" role="tabpanel">
                            <div class="row mt-1">
                                <div class="col-sm-12 col-md-5 border-left">
                                    <form id="frmPicture" method="post" 
                                    action="<?php echo URL; ?>dashboard/updateCarImage/<?php echo $this->myCar['carid'];?>/<?php echo $this->myCar['driverid'];?>"  
                                    enctype="multipart/form-data">
                                        <!-- car image -->
                                        <div class="form-row">
                                            <div class="form-group col-12 p-3 mr-auto ml-auto text-center">
                                                <label for="image-upload">Upload Car Image</label>
                                                <div id="image_contain">
                                                    <?php
                                                    if (empty($this->myCar['car_image']) || $this->myCar['car_image'] == NULL) {
                                                        ?>
                                                        <img id="image-upload" align="middle" class="img-square img-no-padding img-responsive" src="<?php echo URL; ?>public/images/hikeshare-logo.png" alt="Car Image" title='' />

                                                    <?php
                                                    } else if (isset($this->myCar['car_image'])) {
                                                        ?>
                                                        <img id="image-upload" align="middle" class="img-square img-no-padding img-responsive" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($this->myCar['car_image']); ?>" alt="Car Image" title='' />
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-10 mx-auto">
                                                <input type="file" id="inputGroupFile01" class="form-control imgInp custom-file-input" aria-describedby="inputGroupFile01" name="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12 mr-auto ml-auto text-center">
                                                <input form="frmPicture" type="submit" class="btn btn-danger btn-round" value="Upload">
                                            </div>
                                        </div>
                                        <!-- end car image -->
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--details-->
                        <div class="tab-pane" id="carDetails" role="tabpanel">
                            <div class="row mt-1">
                                <div class="col-sm-12 col-md-7">
                                    <h6 class="mt-2 pb-0 text-center">Car Details</h6>
                                    <form method="post" action="<?php echo URL; ?>dashboard/updateCar/<?php echo $this->myCar['carid']; ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="driverid" id="driverid" value="<?php echo $this->user['userid']; ?>">
                                        <!-- registration number -->
                                        <div class="form-row">
                                            <div class="form-group col-9 mr-auto ml-auto">
                                                <label for="registration_number">Registration Number</label>
                                                <input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="Registration Number" value="<?php echo $this->myCar['reg_num']; ?>">
                                            </div>
                                        </div>
                                        <!-- end registration number -->

                                        <!-- make/model/model-year -->
                                        <div class="form-row">
                                            <div class="form-group col-9 mr-auto ml-auto">
                                                <label for="make">Make</label>
                                                <input name="make" id="make" class="form-control" type="text" placeholder="Make" value="<?php echo $this->myCar['make']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-9 mr-auto ml-auto">
                                                <label for="model">Model</label>
                                                <input type="text" class="form-control" name="model" id="model" placeholder="Model" value="<?php echo $this->myCar['model']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-9 mr-auto ml-auto">
                                                <label for="model_year" class="label-control">Model Year</label>
                                                <input type="text" class="form-control datepicker_year" name="model_year" id="model_year" placeholder="Model Year" value="<?php echo $this->myCar['model_year']; ?>">
                                            </div>
                                        </div>
                                        <!-- end make/model/model-year -->

                                        <!-- colour -->
                                        <div class="form-row">
                                            <div class="form-group col-9 mr-auto ml-auto">
                                                <label for="color">Color</label>
                                                <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="<?php echo $this->myCar['color']; ?>">
                                            </div>
                                        </div>
                                        <!-- end colour -->

                                        <!-- number of seats -->
                                        <div class="form-row">
                                            <div class="form-group col-9 mr-auto ml-auto">
                                                <label for="number_of_seats">Number Of Seats (Excluding Driver Seat)</label>
                                                <input class="form-control" type="number" min="1" max="16" name="number_of_seats" id="number_of_seats" placeholder="1" value="<?php echo $this->myCar['seats']; ?>">
                                            </div>
                                        </div>
                                        <!-- end number of seats -->

                                        <!-- button -->
                                        <div class="text-center pb-3">
                                            <input type="submit" class="btn btn-danger btn-round" value="Update">
                                        </div>
                                        <!-- end button -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>