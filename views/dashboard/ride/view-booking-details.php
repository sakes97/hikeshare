<div class="section profile-content">
    <div class="container-fluid">

        <h3>Offer Details</h3>

        <?php if ($_GET['view'] == "view-booking-post") { ?>
            

            <?php if ($_GET['as'] == 'd') { ?>
                <!--as driver -->
                <div class="row">

                    <div id="map" class="col-sm-12 col-md-5 card card-body">
                        <img  src="" alt="Dummy Map">
                    </div>


                    <div id="details" class="col-sm-12 col-md-7">

                        <div class="card card-body">
                        
                            <!-- from/to-->
                            <div class="row">

                                <div class="col-12">
                                    <h5>Request Details</h5>
                                </div>

                                <div class="col-md-6">
                                    <h5>From:<?php echo $this->booking['departure_from']; ?></h5>
                                </div>

                                <div class="col-md-6">
                                    <h5>To:<?php echo $this->booking['destination']; ?></h5>
                                </div>


                                <?php if (($this->booking['return_trip'] == 'Y')  && (!empty($this->return_trip))) { ?>
                                    <div class="col-12">
                                        <p>Return trip will be on
                                            <?php echo date("D, S F Y", strtotime($this->return_trip['departure_date'])); ?>
                                            , at
                                            <?php echo date("H:i a", strtotime($this->return_trip['departure_time'])); ?>
                                            <a href="<?php echo URL;?>dashboard/frmViewBooking/<?php echo $this->return_trip['userid'];?>/<?php echo $this->return_trip['rideid'];?>/<?php echo $this->return_trip['ride_type'];?>/<?php echo $this->return_trip['return_trip'];?>?view=view-booking-post">View Details</a>
                                        </p>
                                    </div>
                                <?php } ?>
                                


                            </div>     
                            
                            
                            <!--days of the week-->
                            <div class="row">
                                
                                <?php if (($this->booking['ride_type'] == 'R') && (isset($this->trip_schedule) || !empty($this->trip_schedule))) { ?>
                                    <div class="col-12">
                                        <h5>Schedule:</h5>
                                        <p>
                                            <?php
                                                foreach ($this->trip_schedule as $day) {
                                                    echo $day['dow'];
                                                }
                                            ?>
                                        </p>
                                    </div>
                                <?php } ?>

                            </div>


                            <!-- date and time -->
                            <div class="row">
                                <?php if ($this->booking['ride_type'] == 'R') { ?>
                                <!--date -->
                                <div class="col-12 p-0 mt-3">
                                    <i class="far fa-calendar-alt fa-5x"></i><br>
                                    <p>
                                        Starts:<?php echo '  ' . date("D, dS F Y", strtotime($this->booking['departure_date'])); ?>
                                    </p>
                                </div>
                                <!--time-->
                                <div class="col-12 p-0 mt-3">
                                    <i class="far fa-clock fa-5x"></i>
                                    <p>
                                        Departure Time:<?php echo '  ' . date("H:i a", strtotime($this->booking['departure_time'])); ?>
                                    </p>
                                    <p>
                                        Return Time:<?php echo '  ' . date("H:i a", strtotime($this->booking['return_time'])); ?>
                                    </p>
                                </div>
                                <?php } else if ($this->booking['ride_type'] == 'O') { ?>
                                    <div class="col-5  mt-3">
                                        <i class="far fa-calendar-alt fa-5x"></i><br>
                                        <p>
                                            <?php echo date("D, dS F Y", strtotime($this->booking['departure_date'])); ?>
                                        </p>
                                    </div>
                                    <!-- time-->
                                    <div class="col-5  mt-3">
                                        <i class="far fa-clock fa-5x"></i>
                                        <p><?php echo date("H:i a", strtotime($this->booking['departure_time'])); ?></p>
                                    </div>
                                <?php  } ?>
                            </div>


                            <!--preferences-->
                            <div class="row">
                                <div class="col-12">
                                    <h4><?php echo $this->booking['firstname'] . "'s"; ?> Preferences</h4>
                                    <br>
                                    <?php
                                        $smoking = $this->booking['smoking_yn'];
                                        $alcohol = $this->booking['alcohol_yn'];
                                        $pets = $this->booking['pets_yn'];

                                        //smoking preference
                                        if ($smoking == 'N' || $smoking == NULL) {
                                            echo '<img class="img-responsive img-square preference-img" alt="No Smoking" src="' . URL . 'public/images/icons/smoking/no-smoking.png" 
                                                    data-toggle="tooltip" data-placement="top" title="No Smoking Allowed"/>';
                                        } else if ($smoking == 'Y') {
                                            echo '<img class="img-responsive img-square preference-img" alt="Smoking allowed" src="' . URL . 'public/images/icons/smoking/smoking.png" 
                                                    data-toggle="tooltip" data-placement="top" title="Smoking Is Permitted"/>';
                                        } else {
                                            echo 'No smoking,';
                                        }

                                        //alchohol preference
                                        if ($alcohol == 'N' || $alcohol == NULL) {
                                            echo '<img class="img-responsive img-square preference-img" alt="No Alcohol" src="' . URL . 'public/images/icons/alcohol/no-alcohol.png" 
                                                    data-toggle="tooltip" data-placement="top" title="No Drinking Is Allowed"/>';
                                        } else if ($alcohol == 'Y') {
                                            echo '<img class="img-responsive img-square preference-img" alt="Alcohol Allowed" src="' . URL . 'public/images/icons/alcohol/alcohol.png" 
                                                    data-toggle="tooltip" data-placement="top" title="Drinking Is Permitted" />';
                                        } else {
                                            echo 'No alcohol,';
                                        }

                                        //pets preference
                                        if ($pets == 'N' || $pets == NULL) {
                                            echo '<img class="img-responsive img-square preference-img" alt="No Pets" src="' . URL . 'public/images/icons/pets/no-pets.jpg" 
                                                    data-toggle="tooltip" data-placement="top" title="No Pets Allowed" />';
                                        } else if ($pets == 'Y') {
                                            echo '<img class="img-responsive img-square preference-img" alt="Pets Allowed" src="' . URL . 'public/images/icons/pets/pets.jpg" 
                                                    data-toggle="tooltip" data-placement="top" title="Pets Are Allowed" />';
                                        } else {
                                            echo 'No pets';
                                        }
                                        ?>
                                </div>
                            </div>
                            <br>
                            
                            <!-- buttons -->
                            <div class="row">
                            
                                <div class="col-12">
                                    <a class="btn btn-default btn-square btn-sm" 
                                    href="<?php echo URL;?>dashboard/request/<?php echo $this->booking['rideid'];?>/<?php echo $this->user['userid'];?>/<?php echo $_GET['for'];?>">
                                        Offer ride
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } else if ($_GET['as'] == 'p') {?>
                <!-- as passenger -->
                <div class="row">

                    <div id="map" class="col-sm-12 col-md-7 card card-body">
                        <img  src="" alt="Dummy Map">
                    </div>


                    <div id="details" class="col-sm-12 col-md-7">


                        <div class="card card-body">


                            <!-- request details-->
                            <?php if (count($this->rides_requests) > 0) { ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        
                                        <table class="table table-borderless table-sm">
                                            <thead>
                                                <th colspan="4" class="text-center">
                                                    Drivers offering to give you a ride
                                                </th>
                                            </thead>
                                            <thead>
                                                <th>Driver</th>
                                                <th>Travel</th>
                                                <th>No. Seats Offered</th>
                                                <th>Response</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($this->rides_requests as $requests) { ?>
                                                <tr>
                                                    <td><?php echo $requests['firstname']. " " . $requests['lastname']; ?></td>
                                                    <td><?php echo $requests['departure_from'] . " - ". $requests['destination'];?></td>
                                                    <td><?php echo $requests['seats_for'];?></td>
                                                    <td>
                                                        <a class="btn btn-round btn-outline-danger btn-sm" 
                                                        href="<?php echo URL;?>dashboard/requestResponse/<?php echo $requests['requestid'];?>/<?php echo $requests['rideid'];?>/Accepted/P/<?php echo $requests['seats_for'];?>/<?php echo $requests['userid'];?>/<?php echo $requests['matching_rideid'];?>/<?php echo $this->booking['userid'];?>">
                                                            <i class="fas fa-check-circle"></i>
                                                        </a>
                                                        <a class="btn btn-round btn-outline-danger btn-sm" href="#">
                                                            <i class="fas fa-times-circle"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <!-- from/to-->
                            <div class="row">

                                <div class="col-12">
                                    <h5>Your Trips Details</h5>
                                </div>

                                <div class="col-md-6">
                                    <h5>From:<?php echo $this->booking['departure_from']; ?></h5>
                                </div>

                                <div class="col-md-6">
                                    <h5>To:<?php echo $this->booking['destination']; ?></h5>
                                </div>


                                <?php if (($this->booking['return_trip'] == 'Y')  && (!empty($this->return_trip))) { ?>
                                    <div class="col-12">
                                        <p>Return trip will be on
                                            <?php echo date("D, S F Y", strtotime($this->return_trip['departure_date'])); ?>
                                            , at
                                            <?php echo date("H:i a", strtotime($this->return_trip['departure_time'])); ?>
                                            <a href="<?php echo URL;?>dashboard/frmViewBooking/<?php echo $this->return_trip['userid'];?>/<?php echo $this->return_trip['rideid'];?>/<?php echo $this->return_trip['ride_type'];?>/<?php echo $this->return_trip['return_trip'];?>?view=view-booking-post">View Details</a>
                                        </p>
                                    </div>
                                <?php } ?>
                                


                            </div>     
                            
                            
                            <!--days of the week-->
                            <div class="row">
                                
                                <?php if (($this->booking['ride_type'] == 'R') && (isset($this->trip_schedule) || !empty($this->trip_schedule))) { ?>
                                    <div class="col-12">
                                        <h5>Schedule:</h5>
                                        <p>
                                            <?php
                                                foreach ($this->trip_schedule as $day) {
                                                    echo $day['dow'];
                                                }
                                            ?>
                                        </p>
                                    </div>
                                <?php } ?>

                            </div>

                            <!-- buttons -->
                            

                            <!-- buttons -->
                                <?php if(date('Y-m-d' ,strtotime($this->booking['departure_date'])) > date('Y-m-d') && $this->booking['status'] !== 'Booked' && $this->booking['status'] !== 'Expired' && $this->booking['status'] !== 'Inactive') { ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <a class="btn btn-default btn-square btn-sm" href="#">
                                                Edit
                                            </a>
                                            <a class="btn btn-default btn-square btn-sm" 
                                            href="<?php echo URL;?>dashboard/deleteTravel/<?php echo $this->booking['return_trip'];?>/<?php echo $this->booking['rideid'];?>/<?php echo $this->booking['driverid'];?>/<?php echo $this->booking['ride_type'];?>">
                                                Delete
                                            </a>
                                            <a class="btn btn-default btn-square btn-sm" 
                                                href="<?php echo URL;?>dashboard/frmResults/<?php echo $request['departure_from'];?>/<?php echo $request['destination'];?>?role=passenger">
                                                Find Matches
                                            </a>
                                        </div>
                                    </div>
                                <?php  } else { ?>
                                    <div class="row">
                                        <div class="col-3">
                                            <?php if($this->booking['status'] == 'Booked') { ?>
                                                <span class="btn btn-square btn-success btn-sm">
                                                    <?php echo $this->booking['status']; ?>
                                                </span>
                                            <?php } else if($this->booking['status'] == 'Expired') { ?>
                                                <span class="btn btn-square btn-danger btn-sm">
                                                    <?php echo $this->booking['status']; ?>
                                                </span>
                                            <?php } else if ($this->booking['status'] == 'Inactive') { ?>
                                                <span class="btn btn-square btn-warning btn-sm">
                                                    <?php echo $this->booking['status']; ?>
                                                </span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>


                            <!-- date and time -->
                            <div class="row">
                                <?php if ($this->booking['ride_type'] == 'R') { ?>
                                <!--date -->
                                <div class="col-12 p-0 mt-3">
                                    <i class="far fa-calendar-alt fa-5x"></i><br>
                                    <p>
                                        Starts:<?php echo '  ' . date("D, dS F Y", strtotime($this->booking['departure_date'])); ?>
                                    </p>
                                </div>
                                <!--time-->
                                <div class="col-12 p-0 mt-3">
                                    <i class="far fa-clock fa-5x"></i>
                                    <p>
                                        Departure Time:<?php echo '  ' . date("H:i a", strtotime($this->booking['departure_time'])); ?>
                                    </p>
                                    <p>
                                        Return Time:<?php echo '  ' . date("H:i a", strtotime($this->booking['return_time'])); ?>
                                    </p>
                                </div>
                                <?php } else if ($this->booking['ride_type'] == 'O') { ?>
                                    <div class="col-5  mt-3">
                                        <i class="far fa-calendar-alt fa-5x"></i><br>
                                        <p>
                                            <?php echo date("D, dS F Y", strtotime($this->booking['departure_date'])); ?>
                                        </p>
                                    </div>
                                    <!-- time-->
                                    <div class="col-5  mt-3">
                                        <i class="far fa-clock fa-5x"></i>
                                        <p><?php echo date("H:i a", strtotime($this->booking['departure_time'])); ?></p>
                                    </div>
                                <?php  } ?>
                            </div>


                            <!--preferences-->
                            <div class="row">
                                <div class="col-12">
                                    <h4><?php echo $this->booking['firstname'] . "'s"; ?> Preferences</h4>
                                    <br>
                                    <?php
                                        $smoking = $this->booking['smoking_yn'];
                                        $alcohol = $this->booking['alcohol_yn'];
                                        $pets = $this->booking['pets_yn'];

                                        //smoking preference
                                        if ($smoking == 'N' || $smoking == NULL) {
                                            echo '<img class="img-responsive img-square preference-img" alt="No Smoking" src="' . URL . 'public/images/icons/smoking/no-smoking.png" 
                                                    data-toggle="tooltip" data-placement="top" title="No Smoking Allowed"/>';
                                        } else if ($smoking == 'Y') {
                                            echo '<img class="img-responsive img-square preference-img" alt="Smoking allowed" src="' . URL . 'public/images/icons/smoking/smoking.png" 
                                                    data-toggle="tooltip" data-placement="top" title="Smoking Is Permitted"/>';
                                        } else {
                                            echo 'No smoking,';
                                        }

                                        //alchohol preference
                                        if ($alcohol == 'N' || $alcohol == NULL) {
                                            echo '<img class="img-responsive img-square preference-img" alt="No Alcohol" src="' . URL . 'public/images/icons/alcohol/no-alcohol.png" 
                                                    data-toggle="tooltip" data-placement="top" title="No Drinking Is Allowed"/>';
                                        } else if ($alcohol == 'Y') {
                                            echo '<img class="img-responsive img-square preference-img" alt="Alcohol Allowed" src="' . URL . 'public/images/icons/alcohol/alcohol.png" 
                                                    data-toggle="tooltip" data-placement="top" title="Drinking Is Permitted" />';
                                        } else {
                                            echo 'No alcohol,';
                                        }

                                        //pets preference
                                        if ($pets == 'N' || $pets == NULL) {
                                            echo '<img class="img-responsive img-square preference-img" alt="No Pets" src="' . URL . 'public/images/icons/pets/no-pets.jpg" 
                                                    data-toggle="tooltip" data-placement="top" title="No Pets Allowed" />';
                                        } else if ($pets == 'Y') {
                                            echo '<img class="img-responsive img-square preference-img" alt="Pets Allowed" src="' . URL . 'public/images/icons/pets/pets.jpg" 
                                                    data-toggle="tooltip" data-placement="top" title="Pets Are Allowed" />';
                                        } else {
                                            echo 'No pets';
                                        }
                                        ?>
                                </div>
                            </div>

                            <!--share buttons-->
                            <div class="row">
                                <div class="col-12">
                                    <h4>Share this journey</h4>
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-neutral btn-facebook btn-just-icon" type="button">
                                        <i class="fab fa-facebook-square"></i>
                                    </button>
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-neutral btn-google btn-just-icon" type="button">
                                        <i class="fab fa-google-plus-g"></i>
                                    </button>
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-neutral btn-twitter btn-just-icon" type="button">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>

            <?php } ?>

        <?php } ?>





    </div>
</div>