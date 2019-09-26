<div class="section profile-content">
    <div class="container">
        <h2>Cars</h2>
        
        <!-- cars section -->
        <div class="profile-section py-1 mb-1 shadow-sm">
            <?php 
                if($this->num_of_cars['NUM_OF_CARS'] < 1) {
            ?>

            <p>User has no cars</p>
            <a class="btn btn-outline-default" href="<?php echo URL; ?>dashboard/add_car">
                Add Car
            </a>

            <?php
                } else if ($this->num_of_cars['NUM_OF_CARS'] > 0 && $this->num_of_cars['NUM_OF_CARS'] <= 4) {
            ?>
            <!-- display users cars -->
            <div class="row">
                <div class="col-12">
                    <h6>User Cars</h6>
                    
                    
                    <div class="col-xs-12 col-md-3 p-1 mb-2">
                        <a class="btn btn-outline-default" href="<?php echo URL; ?>dashboard/add_car">
                            Add A Car
                        </a>
                    </div>
                    <div class="row">
                    <?php 
                    foreach($this->cars as $cars){
                    ?>
                        <div class="col-xs-12 col-md-6">
                            <div class="card card-car">
                                <!-- car image -->
                                <div class="view view-cascade overlay mr-auto ml-auto">
                                    <img class="card-img-top img-square img-no-padding img-responsive img-card-car" 
                                    src="<?php echo 'data:image/jpeg;base64,' . base64_encode($cars['car_image']);?>"
                                    alt="Car Image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!-- card content -->
                                <div class="card-body card-body-cascade">
                                    <!-- title -->
                                    <h6 class="card-title font-weight-bold mb-0 text-center"><?php echo $cars['make']; ?></h6>
                                    <hr/>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Model:</td>
                                                    <td><?php echo $cars['model']; ?><td>
                                                </tr>
                                                <tr>
                                                    <td>Year:</td>
                                                    <td><?php echo $cars['model_year']; ?><td>
                                                </tr>
                                                <tr>
                                                    <td>Color:</td>
                                                    <td><?php echo $cars['color']; ?><td>
                                                </tr>
                                                <tr>
                                                    <td>Seats:</td>
                                                    <td><?php echo $cars['seats']; ?><td>
                                                </tr>
                                                <tr>
                                                    <td>Registration#:</td>
                                                    <td><?php echo $cars['reg_num']; ?><td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- card footer -->
                                <div class="card-footer text-muted text-center">
                                    <a class="btn btn-outline-default" href="<?php echo URL; ?>dashboard/update_Car/<?php echo $cars['carid']; ?>">
                                        Update
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo URL; ?>dashboard/removeCar/<?php echo $cars['carid']; ?>/<?php echo $cars['driverid']; ?>">
                                        Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php 
                    }
                    ?>
                    </div>
                </div>
            </div>
            <!-- end display cars -->

            <?php 
                } else {
            ?>

            <!-- cars list -->
            <!-- end cars list -->

            <?php
                }
            ?>
        </div>
        <!-- end cars section -->
    </div>
</div>