<div class="section profile-content">
    <div class="container-fluid">
        <!-- driver -->
        <?php if ($_GET['role'] == 'driver') { ?>
            <h3 class="mb-3">Ride Matches</h3>

            <?php
                /**
                 * (FOR DRIVER)
                 * filter array to return matching results of passengers travelling to similar destination in
                 * the same current city
                 */
                $this->res_any = array_filter($this->res_any, function ($input) {
                    return $input['ride_as'] == 'P' && $input['status'] == 'Active';
                });
                if (count($this->res_any) > 0) {
            ?>
                

                <div class="row">

                    <div id="results-map" class="col-md-5 card card-body">
                        <p>Map</p>
                    </div>

                    <div class="col-md-7">
                        <div class="card card-body">

                            <!--wrapper nav-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul id="tabs" class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#Matches">
                                                        Passenger Matches <span class="badge badge-default"><?php echo count($this->res_any);?></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#PassengerRequests">
                                                        Passenger Requests <span class="badge badge-warning"><?php echo count($this->rides_requests);?></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#OffersMade">
                                                        Your Offers Made 
                                                        <span class="badge badge-primary">
                                                            <?php 
                                                                /**
                                                                 * $this->users_requests returns all requests made by the user
                                                                 * filter the array to return only offers made to users that have a matching ride
                                                                 */
                                                                $offers_made = array_filter($this->users_requests, function($u_r) {
                                                                    return $u_r['matching_rideid'] == $_GET['for'];
                                                                });

                                                                echo count($offers_made);
                                                            ;?>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div id="my-result-tab-content" class="tab-content">
                                    <!--matches - passenger rides going the same way as the driver -->
                                    <div class="tab-pane active" id="Matches" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless table-md">
                                                        <thead>
                                                            <th>Passenger</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>When</th>
                                                            <th></th>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($this->res_any as $any) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <span data-toggle="tooltip" data-placement="top" title="Click to view profile summary">
                                                                                <a href="#" class="text-danger"><?php echo $any['firstname'] . ' ' . $any['lastname']; ?></a>
                                                                            </span>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $any['departure_from']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $any['destination']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $any['departure_date']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php 
                                                                                $search_result = array_search($any['rideid'],array_map(function($data) {return $data['rideid'];}, $offers_made), true);
                                                                                if($search_result) {
                                                                                    //if the id was found in the array do not display the offer button
                                                                            ?>
                                                                                <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/frmViewBooking/<?php echo $any['userid']; ?>/<?php echo $any['rideid']; ?>/<?php echo $any['ride_type']; ?>/<?php echo $any['return_trip']; ?>?view=view-booking-post&as=d&for=<?php echo $_GET['for']; ?>">
                                                                                    View Details 
                                                                                </a>
                                                                            <?php } else if(!$search_result) { // if the id was not found in the array display offer button ?>
                                                                                <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/request/<?php echo $any['rideid']; ?>/<?php echo $this->user['userid']; ?>/<?php echo $_GET['for']; ?>">
                                                                                    Offer ride
                                                                                </a>
                                                                                <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/frmViewBooking/<?php echo $any['userid']; ?>/<?php echo $any['rideid']; ?>/<?php echo $any['ride_type']; ?>/<?php echo $any['return_trip']; ?>?view=view-booking-post&as=d&for=<?php echo $_GET['for']; ?>">
                                                                                    View Details
                                                                                </a>
                                                                            <?php } ?>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--passenger requests  made to the driver for the trip -->
                                    <div class="tab-pane" id="PassengerRequests" role="tabpanel">
                                        <?php if (count($this->rides_requests) > 0 && !empty($this->rides_requests)) { ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless table-md">
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
                                                                    <td><?php echo $requests['departure_from'] . ' <i class="fas fa-arrow-right"></i> '. $requests['destination'];?></td>
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
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <h4>
                                                        No passengers have made requests for your ride.
                                                    </h4>
                                                    <h4>
                                                        Consider making offers to passengers that have trip requests matching yours in the passenger matches tab.
                                                    </h4>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <!--offers made by the driver to passengers going the same way -->
                                    <div class="tab-pane" id="OffersMade" role="tabpanel">
                                        <?php if(count($offers_made) > 0 && !empty($offers_made)) { ?>
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-md">
                                                    <thead>
                                                        <th>Passenger</th>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>When</th>
                                                        <th>Passenger Response</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($offers_made as $o) { ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $o['Passenger_Name'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $o['departure_from'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $o['destination'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $o['departure_date'];?>
                                                                </td>
                                                                <td>
                                                                    <?php if($o['request_status'] == 'Awaiting Response'){ ?>
                                                                        <span class="alert alert-info">
                                                                            <?php echo $o['request_status'];?>
                                                                        </span>
                                                                    <?php }else if($o['request_status'] == 'Accepted'){ ?>
                                                                        <span class="alert alert-success">
                                                                            <?php echo $o['request_status'];?>
                                                                        </span>
                                                                    <?php }else if($o['request_status'] == 'Declined') { ?>
                                                                        <span class="alert alert-danger">
                                                                            <?php echo $o['request_status'];?>
                                                                        </span>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <h4>
                                                        No offers have been made to passengers.
                                                    </h4>
                                                    <h4>
                                                        To make offers to passengers view matching rides in the Passengers Matches tab.
                                                    </h4>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>  


                            </div>
                        </div>
                    </div>



                </div>
                
                
                


            <?php } else { ?>

                <div class="row">

                    <div id="results-map" class="col-md-6 card card-body">
                        <p>Map</p>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="card card-body">
                            <!-- one way -->
                            <?php if ($this->rideOffer['return_trip'] == 'N' || $this->rideOffer['return_trip'] == 'd') { ?>

                                <!-- trip details -->
                                <div class="row">
                                    <h6 class="alert alert-info ml-2">
                                        One Way Trip
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-md table-borderless">
                                            <thead>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>When</th>
                                                <th>Seats Avail.</th>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <?php echo $this->rideOffer['departure_from']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->rideOffer['destination']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->rideOffer['departure_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->rideOffer['seats_available']; ?>
                                                </td>
                                            </tbody>
                                        </table>
                                        <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                    </div>
                                </div>


                                <!-- return home-->
                                <div class="row">
                                    <p>
                                        Currently no matching trips. Once there are matching trips they will be listed to you.
                                    </p>
                                    <p>
                                        Return <span><a href="<?php echo URL; ?>/dashboard/index">Home</a></span>
                                    </p>
                                </div>

                                <!-- two way -->
                            <?php } else if ($this->rideOffer['return_trip'] == 'Y') { ?>

                                <!-- trip details -->
                                <div class="row">
                                    <h6 class="alert alert-info ml-2">
                                        Two-way Trip
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-md table-borderless">
                                            <thead>
                                                <th></th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>When</th>
                                                <th>Seats Avail.</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-arrow-right"></i>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[0]['departure_from']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[0]['destination']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[0]['departure_date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[0]['seats_available']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-arrow-left"></i>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[1]['departure_from']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[1]['destination']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[1]['departure_date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[1]['seats_available']; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                </div>

                                <!-- return home-->
                                <div class="row">
                                    <p>
                                        Currently no matching trips. Once there are matching trips they will be listed to you.
                                    </p>
                                    <p>
                                        Return <span><a href="<?php echo URL; ?>/dashboard/index">Home</a></span>
                                    </p>
                                </div>

                                <!-- regular (lift club) -->
                            <?php } else if ($this->rideOffer['return_trip'] == 'U') { ?>

                                <!-- trip details -->
                                <div class="row">
                                    <h6 class="alert alert-info ml-2">
                                        Lift Club
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-md table-borderless">
                                            <thead>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>When</th>
                                                <th>Seats Avail.</th>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <?php echo $this->rideOffer['departure_from']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->rideOffer['destination']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->rideOffer['departure_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->rideOffer['seats_available']; ?>
                                                </td>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4">Schedule</th>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <?php

                                                            $count = count($this->trip_schedule);
                                                            foreach ($this->trip_schedule as $ts) {
                                                                $count--;
                                                                if ($count > 0)
                                                                    echo $ts['dow'] . ', ';
                                                                else
                                                                    echo $ts['dow'];
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <br>
                                        <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                    </div>


                                </div>

                                <!-- return home-->
                                <div class="row">
                                    <p>
                                        Currently no matching trips. Once there are matching trips they will be listed to you.
                                    </p>
                                    <p>
                                        Return <span><a href="<?php echo URL; ?>/dashboard/index">Home</a></span>
                                    </p>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>



            <?php } ?>


            <!-- passenger -->
        <?php } else if ($_GET['role'] == 'passenger') { ?>
            <!-- view as a passsenger -->
            <h3 class="mb-3">Ride Matches</h3>
            <?php
                /**
                 * (FOR PASSENGER)
                 * filter array to return matching results of drivers travelling to similar destination in
                 * the same current city
                 */
                $this->res_any = array_filter($this->res_any, function ($input) {
                    return $input['ride_as'] == 'D' && $input['seats_available'] > 0;
                });
                if (count($this->res_any) > 0) {
            ?>
                  
                <div class="row">

                    <div id="results-map" class="col-md-5 card card-body">
                        <p>Map</p>
                    </div>

                    <div class="col-md-7">
                        <div class="card card-body">
                            
                            <!--wrapper nav-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul id="tabs" class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#Matches">
                                                        Driver Matches <span class="badge badge-default"><?php echo count($this->res_any);?></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#DriversOffers">
                                                        Driver Offers <span class="badge badge-warning"><?php echo count($this->rides_requests);?></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#OffersMade">
                                                        Your Requests Made 
                                                        <span class="badge badge-primary">
                                                            <?php 
                                                                /**
                                                                 * $this->users_requests returns all requests made by the user
                                                                 * filter the array to return only offers made to users that have a matching ride
                                                                 */
                                                                $requests_made = array_filter($this->users_requests, function($u_r) {
                                                                    return $u_r['matching_rideid'] == $_GET['for'];
                                                                });

                                                                echo count($requests_made);
                                                            ;?>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        
                            <div class="row">
                                <div id="my-result-tab-content" class="tab-content">
                                    
                                    <!-- matches -->
                                    <div class="tab-pane active" id="Matches" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless table-md">
                                                        <thead>
                                                            <th>Driver</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>When</th>
                                                            <th>Seats Avail.</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($this->res_any as $any) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $any['firstname'] . ' ' . $any['lastname']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $any['departure_from']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $any['destination']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $any['departure_date']; ?>
                                                                    </td>
                                                                    <td id="idSeatsAvailable">
                                                                        <?php echo $any['seats_available']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-default btn-square btn-sm" type="button" id="btnRequest" data-toggle="modal" data-target="#seats_for" data-id="<?php echo $any['rideid']; ?>">
                                                                            Request
                                                                        </button>
                                                                        <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/View_Offer_Details/<?php echo $any['rideid']; ?>/<?php echo $any['userid']; ?>/<?php echo $any['ride_type']; ?>/<?php echo $any['return_trip']; ?>?view=view-offer-post&as=p">
                                                                            View Details
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--awaiting response-->
                                    <div class="tab-pane" id="DriversOffers" role="tabpanel">
                                        <?php if (count($this->rides_requests) > 0 && !empty($this->rides_requests)) { ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless table-md">
                                                            <thead>
                                                                <th>Driver</th>
                                                                <th>Travel</th>
                                                                <th>When</th>
                                                                <th>Your Response</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($this->rides_requests as $requests) { ?>
                                                                    <tr>
                                                                        <td><?php echo $requests['firstname']. " " . $requests['lastname']; ?></td>
                                                                        <td><?php echo $requests['departure_from'] . ' <i class="fas fa-arrow-right"></i> ' . $requests['destination'];?></td>
                                                                        <td><?php echo $requests['departure_date'];?></td>
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
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <h4>
                                                        No drivers have offered you a ride.
                                                    </h4>
                                                    <h4>
                                                        Consider requesting rides to drivers that have trip requests matching yours in the driver matches tab.
                                                    </h4>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <!--offers made -->
                                    <div class="tab-pane" id="OffersMade" role="tabpanel">
                                        
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-md">
                                                <thead>
                                                    <th>Driver</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>When</th>
                                                    <th>Status</th>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>




                                </div>
                            </div>


                        </div>
                    </div>


                </div>

                
            <?php } else { ?>


                <div class="row">

                    <div id="results-map" class="col-md-5 card card-body">
                        <p>Map</p>
                    </div>

                    <div class="col-sm-7 col-md-6">
                        <div class="card card-body">
                            <!-- one way -->
                            <?php if ($this->booking['return_trip'] == 'N' || $this->booking['return_trip'] == 'd') { ?>

                                <!-- trip details -->
                                <div class="row">
                                    <h6 class="alert alert-info ml-2">
                                        One Way Trip
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-md table-borderless">
                                            <thead>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>When</th>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <?php echo $this->booking['departure_from']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->booking['destination']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->booking['departure_date']; ?>
                                                </td>
                                            </tbody>
                                        </table>
                                        <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                    </div>
                                </div>


                                <!-- return home-->
                                <div class="row">
                                    <p>
                                        Currently no matching trips. Once there are matching trips they will be listed to you.
                                    </p>
                                    <p>
                                        Return <span><a href="<?php echo URL; ?>/dashboard/index">Home</a></span>
                                    </p>
                                </div>

                                <!-- two way -->
                            <?php } else if ($this->booking['return_trip'] == 'Y') { ?>

                                <!-- trip details -->
                                <div class="row">
                                    <h6 class="alert alert-info ml-2">
                                        Round Trip
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-md table-borderless">
                                            <thead>
                                                <th></th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>When</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-arrow-right"></i>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[0]['departure_from']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[0]['destination']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[0]['departure_date']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-arrow-left"></i>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[1]['departure_from']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[1]['destination']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[1]['departure_date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->returnTrip[1]['seats_available']; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                </div>

                                <!-- return home-->
                                <div class="row">
                                    <p>
                                        Currently no matching trips. Once there are matching trips they will be listed to you.
                                    </p>
                                    <p>
                                        Return <span><a href="<?php echo URL; ?>/dashboard/index">Home</a></span>
                                    </p>
                                </div>

                                <!-- regular (lift club) -->
                            <?php } else if ($this->booking['return_trip'] == 'U') { ?>

                                <!-- trip details -->
                                <div class="row">
                                    <h6 class="alert alert-info ml-2">
                                        Lift Club
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-md table-borderless">
                                            <thead>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>When</th>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <?php echo $this->booking['departure_from']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->booking['destination']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $this->booking['departure_date']; ?>
                                                </td>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4">Schedule</th>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <?php

                                                            $count = count($this->trip_schedule);
                                                            foreach ($this->trip_schedule as $ts) {
                                                                $count--;
                                                                if ($count > 0)
                                                                    echo $ts['dow'] . ', ';
                                                                else
                                                                    echo $ts['dow'];
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <br>
                                        <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                    </div>


                                </div>

                                <!-- return home-->
                                <div class="row">
                                    <p>
                                        Currently no matching trips. Once there are matching trips they will be listed to you.
                                    </p>
                                    <p>
                                        Return <span><a href="<?php echo URL; ?>/dashboard/index">Home</a></span>
                                    </p>
                                </div>

                            <?php } ?>
                        </div>
                    </div>



                </div>


            <?php } ?>

        <?php } ?>


        <!-- seats_for modal -->
        <div class="modal fade" id="seats_for" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-register">
                <div class="modal-content">
                    <div class="modal-header no-border-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6>Send A Request To Share</h6>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo URL; ?>dashboard/request">
                            <input type="hidden" name="rideid" id="input_rideid" value="">
                            <input type="hidden" name="userid" id="input_userid" value="<?php echo $this->user['userid']; ?>">
                            <input type="hidden" name="matching_rideid" id="input_matching_rideid" value="<?php echo $_GET['for']; ?>">
                            <div class="form-row">
                                <div class="form-group ml-auto mr-auto">
                                    <label for="seats_for">Please Select Number Of Seats</label>
                                    <input id="maxNumberTarget" name="seats_for" type="number" min="???" max="???" class="form-control form-control-sm text-center">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group ml-auto mr-auto">
                                    <input type="submit" class="btn btn-circle btn-danger" value="Request To Share">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>