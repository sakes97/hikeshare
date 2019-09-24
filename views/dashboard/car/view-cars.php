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
                    <div class="col-xs-12 col-md-3 p-1">
                    </div>
                    <?php 
                    foreach($this->cars as $cars){
                    ?>
                    <div class="col-xs-12 col-md-6">
                        <div class="card card-car">
                            <!-- car image -->
                            <div class="view view-cascade overlay">
                                <img class="card-img-top" 
                                src="<?php echo 'data:image/jpeg;base64,' . base64_encode($cars['car_image']);?>"
                                alt="Car Image">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!-- card content -->
                            <div class="card-body card-body-cascade text-center">
                                <!-- title -->
                                <h6 class="card-title font-weight-bold mb-2"><?php echo $cars['make']; ?></h6>
                                <hr/>
                                <p class="card-text">Model: <?php echo $cars['model']; ?></p>
                                <p class="card-text">Year: <?php echo $cars['model_year']; ?></p>
                                <p class="card-text">Color: <?php echo $cars['color']; ?></p>
                                <p class="card-text">Seats: <?php echo $cars['seats']; ?></p>
                                <p class="card-text">Registration#: <?php echo $cars['reg_num']; ?></p>
                            </div>
                            <!-- card footer -->
                            <div class="card-footer text-muted text-center">
                                2 days ago
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
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