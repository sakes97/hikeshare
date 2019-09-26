<div class="section profile-content">
    <div class="container">

        <h2>Add Car</h2>
        <?php 
            if($this->num_of_cars['NUM_OF_CARS'] > 0){
        ?>
        <a class="btn btn-outline-default" href="<?php echo URL; ?>dashboard/viewCars">
            View Cars
        </a>
        <?php
            }
        ?>
        <!-- car details -->
        <div class="row">
            <div class="col-12">
                <h6 class="mt-2 pb-0 text-center">Car Details</h6>
                <form method="post" action="<?php echo URL;?>dashboard/addCar" enctype="multipart/form-data">
                    <input type="hidden" name="driverid" id="driverid" value="<?php echo $this->user['userid']; ?>" >
                    <!-- car image -->
                    <div class="form-row">
                    <div class="form-group col-md-4 p-3 mr-auto ml-auto text-center">
                        <label for="image-upload">Upload Car Image</label>
                        <div id="image_contain">
                        <img id="image-upload" align="middle" class="img-square img-no-padding img-responsive"
                        src="<?php echo URL; ?>public/images/hikeshare-logo.png" alt="Car Image"
                        title=''/>
                        </div>
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-5 mr-auto ml-auto">
                        <input type="file" id="inputGroupFile01" class="form-control imgInp custom-file-input" 
                        aria-describedby="inputGroupFile01" name="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                    </div>
                    </div>
                    <!-- end car image -->

                    <!-- registration number -->
                    <div class="form-row">
                    <div class="form-group col-sm-6 col-md-4 p-3 ">
                        <label for="registration_number">Registration Number</label>
                        <input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="Registration Number">
                    </div>
                    </div>
                    <!-- end registration number -->

                    <!-- make/model/model-year -->
                    <div class="form-row">
                    <div class="form-group col-sm-12 col-md-4 p-3">
                        <label for="make">Make</label>
                        <input name="make" id="make" class="form-control" type="text" placeholder="Make">
                    </div>
                    <div class="form-group col-sm-12 col-md-4 p-3">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" name="model" id="model" placeholder="Model">
                    </div>
                    <div class="form-group col-sm-12 col-md-4 p-3">
                        <label for="model_year" class="label-control">Model Year</label>
                        <input type="text" class="form-control datepicker_year" name="model_year" id="model_year" placeholder="Model Year">
                    </div>
                    </div>
                    <!-- end make/model/model-year -->

                    <!-- colour -->
                    <div class="form-row">
                    <div class="form-group col-sm-6 col-md-4 p-3">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" name="color" id="color" placeholder="Color">
                    </div>
                    </div>
                    <!-- end colour -->

                    <!-- number of seats -->
                    <div class="form-row">
                    <div class="form-group col-sm-8 col-md-3 p-3">
                        <label for="number_of_seats">Number Of Seats (Excluding Driver Seat)</label>
                        <input class="form-control" type="number" min="1" max="16" name="number_of_seats" id="number_of_seats">
                    </div>
                    </div>
                    <!-- end number of seats -->

                    <!-- button -->
                    <div class="text-center pb-3">
                    <input type="submit" class="btn btn-outline-danger btn-round" value="submit">
                    </div>
                    <!-- end button -->
                </form>
            </div>
        </div>
        <!-- end car details -->

    </div>
</div>