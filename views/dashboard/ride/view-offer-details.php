<div class="section profile-content">
    <div class="container">

        <h3>Offer Details</h3>

        <?php if ($_GET['view'] == "view-offer-post") { ?>

            <?php if ($_GET['as'] == 'd') {?>
                <div class="row">


                    <div id="map" class="col-6">
                        <img  src="" alt="Dummy Map">
                    </div>


                    <div id="details" class="col-6">

                        <?php if (count($this->rides_requests) > 0 || count($this->passengers) > 0) { ?>
                            <!-- if there are ride request or there are passengers booked for the trip --> 

                            <?php if (count($this->rides_requests) > 0) { ?>
                            <!-- request details-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        
                                        <table class="table table-borderless">
                                            <thead>
                                                <th colspan="4" class="text-center">
                                                    Passengers Requesting To Share Your Ride
                                                </th>
                                            </thead>
                                            <thead>
                                                <th>Passenger</th>
                                                <th>Travel</th>
                                                <th>Seats Requested</th>
                                                <th>Response</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($this->rides_requests as $requests) { ?>
                                                <tr>
                                                    <td><?php echo $requests['firstname']. " " . $requests['lastname']; ?></td>
                                                    <td><?php echo $requests['departure_from'] . " ". $requests['destination'];?></td>
                                                    <td><?php echo $requests['seats_for'];?></td>
                                                    <td>
                                                        <a class="btn btn-round btn-outline-danger btn-sm" 
                                                        href="<?php echo URL;?>dashboard/requestResponse/<?php echo $requests['requestid'];?>/<?php echo $this->rideOffer['rideid'];?>/Accepted/D/<?php echo $requests['seats_for'];?>/<?php echo $this->rideOffer['userid'];?>/<?php echo $requests['matching_rideid'];?>/<?php echo $requests['userid'] ?>">
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
                            
                            <!--from/to-->
                            <div class="row">

                                <div class="col-12 text-center">
                                    <h5>Your Rides Details</h5>
                                </div>

                                <div class="col-md-6">
                                    <h5>From:<?php echo $this->rideOffer['departure_from']; ?></h5>
                                </div>

                                <div class="col-md-6">
                                    <h5>To:<?php echo $this->rideOffer['destination']; ?></h5>
                                </div>



                            </div>

                            <!-- days of the week -->
                            <div class="row">

                                <?php if (($this->rideOffer['ride_type'] == 'R') && (isset($this->trip_schedule) || !empty($this->trip_schedule))) { ?>
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
                            <?php if(date('Y-m-d' ,strtotime($this->rideOffer['departure_date'])) > date('Y-m-d')) { ?>
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-default btn-square btn-sm" href="#">
                                            Edit
                                        </a>
                                        <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/frmResults/<?php echo $this->rideOffer['departure_from']; ?>/<?php echo $this->rideOffer['destination']; ?>?role=driver">
                                            Find Matches
                                        </a>
                                        <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/deleteTravel/<?php echo $this->rideOffer['return_trip']; ?>/<?php echo $this->rideOffer['rideid']; ?>/<?php echo $this->rideOffer['driverid']; ?>/<?php echo $this->rideOffer['ride_type']; ?>">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            <?php  } else { ?>
                                <div class="row">
                                    <div class="col-3">
                                        <?php if($this->rideOffer['status'] == 'Booked') { ?>
                                            <span class="btn btn-square btn-success btn-sm">
                                                <?php echo $this->rideOffer['status']; ?>
                                            </span>
                                        <?php } else if($this->rideOffer['status'] == 'Expired') { ?>
                                            <span class="btn btn-square btn-danger btn-sm">
                                                <?php echo $this->rideOffer['status']; ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- date and time -->
                            <div class="row">
                                <?php if ($this->rideOffer['ride_type'] == 'R') { ?>
                                    <!--date -->
                                    <div class="col-12 p-0 mt-3">
                                        <i class="far fa-calendar-alt fa-5x"></i><br>
                                        <p>
                                            Starts:<?php echo '  ' . date("D, dS F Y", strtotime($this->rideOffer['departure_date'])); ?>
                                        </p>
                                    </div>
                                    <!--time-->
                                    <div class="col-12 p-0 mt-3">
                                        <i class="far fa-clock fa-5x"></i>
                                        <p>
                                            Departure Time:<?php echo '  ' . date("H:i a", strtotime($this->rideOffer['departure_time'])); ?>
                                        </p>
                                        <p>
                                            Return Time:<?php echo '  ' . date("H:i a", strtotime($this->rideOffer['return_time'])); ?>
                                        </p>
                                    </div>
                                <?php } else if ($this->rideOffer['ride_type'] == 'O') { ?>
                                        <div class="col-5 mt-3">
                                            <i class="far fa-calendar-alt fa-5x"></i><br>
                                            <p>
                                                <?php echo date("D, dS F Y", strtotime($this->rideOffer['departure_date'])); ?>
                                            </p>
                                        </div>
                                        <!-- time-->
                                        <div class="col-4 mt-3">
                                            <i class="far fa-clock fa-5x"></i>
                                            <p><?php echo date("H:i a", strtotime($this->rideOffer['departure_time'])); ?></p>
                                        </div>
                                <?php  } ?>
                            </div>

                            <div class="row">

                                <?php if (($this->rideOffer['return_trip'] == 'Y')  && (!empty($this->return_trip))) { ?>
                                    <div class="col-12">
                                        <p>Return trip will be on
                                            <?php echo date("D, dS F Y", strtotime($this->return_trip['departure_date'])); ?>
                                            , at
                                            <?php echo date("H:i a", strtotime($this->return_trip['departure_time'])); ?>
                                            <a href="<?php echo URL; ?>dashboard/View_Offer_Details/<?php echo $this->return_trip['rideid']; ?>/<?php echo $this->return_trip['userid']; ?>/<?php echo $this->return_trip['ride_type'];?>?view=view-offer-post&as=d">View Details</a>
                                        </p>
                                    </div>
                                <?php } ?>

                            </div>

                            <!--who will be driving and passengers -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>Vehicle</h4>
                                    <p><?php echo $this->rideOffer['make']; ?></p>
                                </div>


                                <?php if(count($this->passengers) > 0) { ?>
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-sm">
                                                <thead>
                                                    <th colspan="3" class="text-center">
                                                        Passengers
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($this->passengers as $acPas) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $acPas['firstname'] . ' ' . $acPas['lastname']; ?>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-outline-danger btn-round btn-sm m-2" 
                                                                href="<?php echo URL;?>dashboard/frmMessages?view=user-chat">
                                                                    Message
                                                                </a>
                                                                <a class="btn btn-outline-danger btn-round btn-sm m-2" href="#">
                                                                    View Profile
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>



                            </div>


                            

                        <?php } else if(count($this->rides_requests) < 1 ) {?>
                            
                            <!-- if there aren't any ride requests and there aren't any passengers that are booked for the trip -->

                            <div class="col-12 text-center">
                                <h5>Your Rides Details</h5>
                            </div>

                            <!-- from-to-->
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h5>From:<?php echo $this->rideOffer['departure_from']; ?></h5>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <h5>To:<?php echo $this->rideOffer['destination']; ?></h5>
                                </div>
                            </div>
                            
                            <!-- days of the week -->
                            <?php if (($this->rideOffer['ride_type'] == 'R') && (isset($this->trip_schedule) || !empty($this->trip_schedule))) { ?>
                                <div class="row">
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
                                </div>
                            <?php } ?>

                            <!--action buttons-->
                            <?php if(date('Y-m-d' ,strtotime($this->rideOffer['departure_date'])) > date('Y-m-d')) { ?>
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-default btn-square btn-sm" href="#">
                                            Edit
                                        </a>
                                        <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/frmResults/<?php echo $this->rideOffer['departure_from']; ?>/<?php echo $this->rideOffer['destination']; ?>?role=driver">
                                            Find Matches
                                        </a>
                                        <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/deleteTravel/<?php echo $this->rideOffer['return_trip']; ?>/<?php echo $this->rideOffer['rideid']; ?>/<?php echo $this->rideOffer['driverid']; ?>/<?php echo $this->rideOffer['ride_type'];?>">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            <?php  } else if (date('Y-m-d', strtotime($this->rideOffer['departure_date'])) == date('Y-m-d')) { ?>
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/deleteTravel/<?php echo $this->rideOffer['return_trip']; ?>/<?php echo $this->rideOffer['rideid']; ?>/<?php echo $this->rideOffer['driverid']; ?>/<?php echo $this->rideOffer['ride_type'];?>">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            <?php  } else { ?>
                                <div class="row">
                                    <div class="col-3">
                                        <?php if($this->rideOffer['status'] == 'Booked') { ?>
                                            <span class="btn btn-square btn-success btn-sm">
                                                <?php echo $this->rideOffer['status']; ?>
                                            </span>
                                        <?php } else if($this->rideOffer['status'] == 'Expired') { ?>
                                            <span class="btn btn-square btn-danger btn-sm">
                                                <?php echo $this->rideOffer['status']; ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <!--trip schedule-->
                            <div class="row">
                                <?php if ($this->rideOffer['ride_type'] == 'R') { ?>
                                    <!--date -->
                                    <div class="col-12 mt-3">
                                        <i class="far fa-calendar-alt fa-5x"></i><br>
                                        <p>
                                            Starts:<?php echo '  ' . date("D, dS F Y", strtotime($this->rideOffer['departure_date'])); ?>
                                        </p>
                                    </div>
                                    <!--time-->
                                    <div class="col-12 mt-3">
                                        <i class="far fa-clock fa-5x"></i>
                                        <p>
                                            Departure Time:<?php echo '  ' . date("H:i a", strtotime($this->rideOffer['departure_time'])); ?>
                                        </p>
                                        <p>
                                            Return Time:<?php echo '  ' . date("H:i a", strtotime($this->rideOffer['return_time'])); ?>
                                        </p>
                                    </div>
                                <?php } else if ($this->rideOffer['ride_type'] == 'O') { ?>
                                    <div class="col-5 mt-3">
                                        <i class="far fa-calendar-alt fa-5x"></i><br>
                                        <p>
                                            <?php echo date("D, dS F Y", strtotime($this->rideOffer['departure_date'])); ?>
                                        </p>
                                    </div>
                                    <!-- time-->
                                    <div class="col-4 mt-3">
                                        <i class="far fa-clock fa-5x"></i>
                                        <p><?php echo date("H:i a", strtotime($this->rideOffer['departure_time'])); ?></p>
                                    </div>
                                <?php  } ?>
                                <!-- when return trip will be if there is one -->
                                <?php if (($this->rideOffer['return_trip'] == 'Y')  && (!empty($this->return_trip))) { ?>
                                    <div class="col-12">
                                        <p>Return trip will be on
                                            <?php echo date("D, dS F Y", strtotime($this->return_trip['departure_date'])); ?>
                                            , at
                                            <?php echo date("H:i a", strtotime($this->return_trip['departure_time'])); ?>
                                            <a href="<?php echo URL; ?>dashboard/View_Offer_Details/<?php echo $this->return_trip['rideid']; ?>/<?php echo $this->return_trip['userid']; ?>/<?php echo $this->return_trip['ride_type']; ?>?view=view-offer-post&as=d">View Details</a>
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>

                            <!--who will be driving-->
                            <div class="row">
                                <div class="col-12">
                                    <h4>Vehicle</h4>
                                    <p><?php echo $this->rideOffer['make']; ?></p>
                                    <p>Seats left: <?php echo $this->rideOffer['seats_available'];?></p>
                                </div>
                            </div>

                        <?php } ?>

                    </div>


                </div>
            <?php } else if ($_GET['as'] == 'p')  {?>

                <div class="row">

                    <div id="map" class="col-6">
                        <img  src="" alt="Dummy Map">
                    </div>


                    <div id="details" class="col-6">

                        <!--from/to-->
                        <div class="row">

                            <div class="col-12 text-center">
                                <h5>Your Trips Details</h5>
                            </div>

                            <div class="col-md-6">
                                <h5>From:<?php echo $this->rideOffer['departure_from']; ?></h5>
                            </div>

                            <div class="col-md-6">
                                <h5>To:<?php echo $this->rideOffer['destination']; ?></h5>
                            </div>

                            

                        </div>

                        <!-- days of the week -->
                        <div class="row">

                            <?php if (($this->rideOffer['ride_type'] == 'R') && (isset($this->trip_schedule) || !empty($this->trip_schedule))) { ?>
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
                            <?php if ($this->rideOffer['ride_type'] == 'R') { ?>
                                <!--date -->
                                <div class="col-12 p-0 mt-3">
                                    <i class="far fa-calendar-alt fa-5x"></i><br>
                                    <p>
                                        Starts:<?php echo '  ' . date("D, dS F Y", strtotime($this->rideOffer['departure_date'])); ?>
                                    </p>
                                </div>
                                <!--time-->
                                <div class="col-12 p-0 mt-3">
                                    <i class="far fa-clock fa-5x"></i>
                                    <p>
                                        Departure Time:<?php echo '  ' . date("H:i a", strtotime($this->rideOffer['departure_time'])); ?>
                                    </p>
                                    <p>
                                        Return Time:<?php echo '  ' . date("H:i a", strtotime($this->rideOffer['return_time'])); ?>
                                    </p>
                                </div>
                            <?php } else if ($this->rideOffer['ride_type'] == 'O') { ?>
                                    <div class="col-5 mt-3">
                                        <i class="far fa-calendar-alt fa-5x"></i><br>
                                        <p>
                                            <?php echo date("D, dS F Y", strtotime($this->rideOffer['departure_date'])); ?>
                                        </p>
                                    </div>
                                    <!-- time-->
                                    <div class="col-5 mt-3">
                                        <i class="far fa-clock fa-5x"></i>
                                        <p><?php echo date("H:i a", strtotime($this->rideOffer['departure_time'])); ?></p>
                                    </div>
                            <?php  } ?>
                            <?php if (($this->rideOffer['return_trip'] == 'Y')  && (!empty($this->return_trip))) { ?>
                                <div class="col-12">
                                    <p>Return trip will be on
                                        <?php echo date("D, dS F Y", strtotime($this->return_trip['departure_date'])); ?>
                                        , at
                                        <?php echo date("H:i a", strtotime($this->return_trip['departure_time'])); ?>
                                        <a href="<?php echo URL; ?>dashboard/View_Offer_Details/<?php echo $this->return_trip['rideid']; ?>/<?php echo $this->return_trip['userid']; ?>/<?php echo $this->return_trip['ride_type']; ?>?view=view-offer-post&as=p">View Details</a>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>

                        <!--who will be driving-->
                        <div class="row">
                            <div class="col-12">
                                

                                <h4>Who will be driving?</h4>
                                <p>
                                    <?php echo $this->rideOffer['firstname']; ?>
                                    <span class="p-3">
                                        <a href="#" class="btn btn-outline-danger btn-sm btn-round">
                                            Message 
                                         </a>
                                         <a href="#" class="btn btn-outline-danger btn-sm btn-round">
                                             View Profile
                                         </a>
                                    </span>
                                </p>
                                
                                
                            </div>
                        </div>
                        
                        <!-- vehicle and passengers -->
                        <div class="row">
                            <div class="col-12">
                                <h4>Vehicle</h4>
                                <p><?php echo $this->rideOffer['make']; ?></p>
                            </div>
                            <?php if(count($this->passengers) > 0) { ?>
                                <div class="col-12">
                                    <h4>Passengers (<?php echo count($this->passengers);?>)</h4>
                                    <?php foreach($this->passengers as $acPas) { ?>
                                        <p>
                                            <?php echo $acPas['firstname'] . ' ' . $acPas['lastname']; ?>
                                            <span>
                                                <?php  if ($acPas['userid'] !== $this->user['userid']) { ?>
                                                
                                                    <!-- <a class="btn btn-outline-danger btn-round btn-sm m-2" 
                                                    href="<?php echo URL;?>dashboard/frmMessages?view=user-chat">
                                                        Message
                                                    </a> -->

                                                    <a class="btn btn-outline-danger btn-round btn-sm m-2" href="#">
                                                        View Profile
                                                    </a>

                                                <?php } ?>
                                            </span>
                                        </p>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>

                        <!--preferences-->
                        <div class="row">
                            <div class="col-12">
                                <h4><?php echo $this->rideOffer['firstname'] . "'s"; ?> Rules</h4>
                                <?php
                                        $smoking = $this->rideOffer['smoking_yn'];
                                        $alcohol = $this->rideOffer['alcohol_yn'];
                                        $pets = $this->rideOffer['pets_yn'];

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
                        

                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-sm btn-square btn-default">
                                    Request
                                </button>
                            </div>
                        </div>


                    </div>



                </div>


            <?php } ?>




        <?php }?>

        
    </div>
</div>