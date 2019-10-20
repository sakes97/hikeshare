<div class="section profile-content">
    <div class="container-fluid bg-white shadow-sm pb-2 border-bottom-0">
        <div class="row">
            <!-- owner -->
            <div class="col-sm-12 col-lg-3 text-center">
                <div class="owner">
                    <div class="avatar">
                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($this->user['picture']); ?>" alt="User Profile Picture" class="img-circle img-no-padding img-responsive img-circle">
                    </div>
                </div>
                <div class="name">
                    <h4 class="title">
                        <?php echo $this->user['firstname'] . ' ' . $this->user['lastname']; ?>
                        <br />
                    </h4>
                    <a class="btn btn-outline-default btn-round" href="<?php echo URL; ?>dashboard/profile" id="edit_profile">Edit Profile <i class="fas fa-edit"></i></a>
                </div>
                <div class="member-info-view text-center mr-auto ml-auto ">
                    <table class="table table-sm table-hover">
                        <tr>
                            <td>Member Since</td>
                            <td>June 8 2019</td>
                        </tr>
                        <tr>
                            <td>
                                Preferences
                                <br>
                                <a id="edit_preferences" href="<?php echo URL; ?>dashboard/profile?profile_view=1">Edit
                                    Preferences<i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <?php
                                $smoking = $this->user['smoking_yn'];
                                $alcohol = $this->user['alcohol_yn'];
                                $pets = $this->user['pets_yn'];

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
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- end owner -->

            <!-- rides -->
            <div class="col-sm-12 col-lg-9">
                
                
                <?php if(count($this->activeOffers) > 0 || (count($this->active_pass_post) > 0) || count($this->pas_req) > 0) { ?>
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <!-- wrapper nav-->
                            <div class="nav-tabs-navigation pb-0 mb-0">
                                <div class="nav-tabs-wrapper">
                                    <ul id="tabs" class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#liftsOffered">
                                                Lifts As A Driver
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#ridesBooked">
                                                Lifts As A Passenger
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--sub nav-->
                            <div id="sub-tab-nav" class="tab-content">
                                
                                <!--driver content-->
                                <div class="tab-pane active" id="liftsOffered" role="tabpanel">
                                    <!--nav-->
                                    <ul id="sub-lift-nav" class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#offeringDriver">
                                                Offering
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#bookedDriver">
                                                Booked
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#clubDriver">
                                                Lift Club
                                            </a>
                                        </li>
                                    </ul>

                                    <!--content-->
                                    <div id="driver-inner-tab" class="tab-content">
                                        <!--offering-->
                                        <div class="tab-pane active" id="offeringDriver" role="tabpanel">
                                            <?php if (count($this->activeOffers) > 0) { ?>          
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <!-- <p>
                                                                        No. Of Passenger Requests (<?php echo $this->count_all_requests['REQUEST_COUNT'];?>) 
                                                                        <a class="btn btn-sm btn-square btn-default" href="<?php echo URL;?>dashboard/frmViewRequests">View</a>
                                                                    </p> -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-borderless table-sm">
                                                                            <thead>
                                                                                <th>From</th>
                                                                                <th>To</th>
                                                                                <th>When</th>
                                                                                <th>Seats Left</th>
                                                                                <th>Tot. Requests</th>
                                                                                <th></th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach ($this->activeOffers as $offer) { ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?php echo $offer['departure_from']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $offer['destination']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $offer['departure_date']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $offer['seats_available']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php if($offer['request_count'] > 0) {?>
                                                                                                <a href="<?php echo URL;?>dashboard/View_Offer_Details/<?php echo $offer['rideid'];?>/<?php echo $offer['userid'];?>/<?php echo $offer['ride_type'];?>?view=view-offer-post&as=d">
                                                                                                    <span class="badge badge-warning">
                                                                                                        <?php echo $offer['request_count']; ?>
                                                                                                    </span>
                                                                                                </a>
                                                                                            <?php } else { ?>
                                                                                                <?php echo $offer['request_count'];?>
                                                                                            <?php } ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="dropdown-container">
                                                                                                <button class="btn btn-default btn-square btn-sm dropdown-toggle" data-toggle="dropdown" role="button"
                                                                                                    aria-haspopup="true" aria-expanded="false" id="IndexActionMenu">
                                                                                                    Actions
                                                                                                </button>
                                                                                                <div class="dropdown-menu" aria-labelledby="IndexActionMenu" role="menu">
                                                                                                    <a class="dropdown-item" 
                                                                                                    href="<?php echo URL;?>dashboard/View_Offer_Details/<?php echo $offer['rideid'];?>/<?php echo $offer['userid'];?>/<?php echo $offer['ride_type'];?>?view=view-offer-post&as=d">
                                                                                                        View Details
                                                                                                    </a>
                                                                                                    <a class="dropdown-item" 
                                                                                                    href="<?php echo URL;?>dashboard/frmResults/<?php echo $offer['rideid'];?>?action=find-match&role=driver&for=<?php echo $offer['rideid'];?>&from=<?php echo $offer['departure_from'];?>&to=<?php echo $offer['destination'];?>">
                                                                                                        Find Matches
                                                                                                    </a>
                                                                                                    <a class="dropdown-item" href="#">
                                                                                                        Edit
                                                                                                    </a>
                                                                                                    <a class="dropdown-item" 
                                                                                                    href="<?php echo URL;?>dashboard/deleteTravel/<?php echo $offer['return_trip'];?>/<?php echo $offer['rideid'];?>/<?php echo $offer['userid'];?>/<?php echo $offer['ride_type'];?>">
                                                                                                        Delete
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php } else { ?>
                                                    <p>No lifts offered</p>
                                            <?php } ?>
                                        </div>
                                        <!--booked-->
                                        <div class="tab-pane" id="bookedDriver" role="tabpanel">
                                            <?php if(count($this->upcomingBkdTrips_D) > 0) { ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless table-sm">
                                                                        <thead>
                                                                            <th>From</th>
                                                                            <th>To</th>
                                                                            <th>When</th>
                                                                            <th>Contribution</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($this->upcomingBkdTrips_D as $trip_D) { ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo $trip_D['departure_from'];?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $trip_D['destination'];?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $trip_D['departure_date'];?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $trip_D['contribution_per_head']; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <!-- <div class="dropdown-container">
                                                                                            <button class="btn btn-default btn-square btn-sm dropdown-toggle" data-toggle="dropdown" role="button"
                                                                                                aria-haspopup="true" aria-expanded="false" id="IndexActionMenu">
                                                                                                Actions
                                                                                            </button>
                                                                                            <div class="dropdown-menu" aria-labelledby="IndexActionMenu" role="menu">
                                                                                                <a class="dropdown-item" 
                                                                                                href="<?php echo URL;?>dashboard/View_Offer_Details/<?php echo $trip['rideid'];?>/<?php echo $trip['driverid'];?>/<?php echo $trip['ride_type'];?>?view=view-offer-post&as=d">
                                                                                                    View Details
                                                                                                </a>
                                                                                                <a class="dropdown-item" 
                                                                                                href="<?php echo URL;?>dashboard/deleteTravel/<?php echo $offer['return_trip'];?>/<?php echo $offer['rideid'];?>/<?php echo $offer['userid'];?>/<?php echo $offer['ride_type'];?>">
                                                                                                    Delete
                                                                                                </a>
                                                                                            </div>
                                                                                        </div> -->
                                                                                        <a class="btn btn-sm btn-square btn-default" 
                                                                                        href="<?php echo URL;?>dashboard/View_Offer_Details/<?php echo $trip_D['rideid'];?>/<?php echo $trip_D['driverid'];?>/O?view=view-offer-post&as=d">
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
                                                </div>
                                            <?php } else { ?>
                                                <p>no booked trips</p>
                                            <?php } ?>
                                        </div>
                                        <!--club--> 
                                        <div class="tab-pane" id="clubDriver" role="tabpanel">
                                            <?php if(count($this->club_D) > 0) { ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless table-sm">
                                                                        <thead>
                                                                            <th>Start Date</th>
                                                                            <th>From</th>
                                                                            <th>To</th>
                                                                            <th>Contribution</th>
                                                                            <th>Depature Time</th>
                                                                            <th>Return Time</th>
                                                                            <th></th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($this->club_D as $club) { ?> 
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?php echo date('d M Y', strtotime($club['departure_date']));?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $club['departure_from'];?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $club['destination'];?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $club['contribution_per_head'];?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo date('H:i', strtotime($club['departure_time']));?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo date('H:i', strtotime($club['return_time']));?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="#" class="btn btn-sm btn-default btn-square">
                                                                                                View Details
                                                                                            </a>
                                                                                            <a href="#" class="btn btn-sm btn-square btn-outline-danger">
                                                                                                Leave Club
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
                                                </div>
                                            <?php } else {echo "no active clubs";} ?>
                                        </div>
                                    </div>

                                </div>

                                <!--passenger content-->
                                <div class="tab-pane" id="ridesBooked" role="tabpanel">
                                    <!--nav-->
                                    <ul id="sub-lift-nav" class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#requestingPassenger">
                                                Requesting
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#bookedPassenger">
                                                Booked
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#clubPassenger">
                                                Lift Club
                                            </a>
                                        </li>
                                    </ul>
                                    <!--content-->
                                    <div id="passenger-inner-tab" class="tab-content">
                                        <!--requesting-->
                                        <div class="tab-pane active" id="requestingPassenger" role="tabpanel">
                                            <?php if (count($this->active_pass_post) > 0) {?>
                                                    <div class="row">
                                                        <div class="col-12 m-1">
                                                            
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    
                                                                    <div class="table-responsive">

                                                                        <table class="table table-borderless table-sm">
                                                                            <thead>
                                                                                <th>From</th>
                                                                                <th>To</th>
                                                                                <th>When</th>
                                                                                <th>No. Offers</th>
                                                                                <th colspan="2">Status</th>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach ($this->active_pass_post as $request) { ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?php echo $request['departure_from']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $request['destination']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $request['departure_date']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $request['offer_count']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <button class="btn btn-sm btn-square btn-primary">  
                                                                                                <?php echo $request['status'];?>
                                                                                            </button>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="dropdown-container">
                                                                                                <button class="btn btn-default btn-square btn-sm dropdown-toggle" data-toggle="dropdown" role="button"
                                                                                                    aria-haspopup="true" aria-expanded="false" id="IndexActionMenu">
                                                                                                    Actions
                                                                                                </button>
                                                                                                <div class="dropdown-menu" aria-labelledby="IndexActionMenu" role="menu">
                                                                                                    <a class="dropdown-item" 
                                                                                                    href="<?php echo URL;?>dashboard/frmViewBooking/<?php echo $request['userid'];?>/<?php echo $request['rideid'];?>/<?php echo $request['ride_type'];?>/<?php echo $request['return_trip'];?>?view=view-booking-post&as=p">
                                                                                                        View Details
                                                                                                    </a>
                                                                                                    <a class="dropdown-item" 
                                                                                                    href="<?php echo URL;?>dashboard/frmResults/<?php echo $request['rideid'];?>?action=find-match&role=passenger&for=<?php echo $request['rideid'];?>&from=<?php echo $request['departure_from'];?>&to=<?php echo $request['destination'];?>">
                                                                                                        Find Matches
                                                                                                    </a>
                                                                                                    <a class="dropdown-item" href="#">
                                                                                                        Edit
                                                                                                    </a>
                                                                                                    <a class="dropdown-item" 
                                                                                                    href="<?php echo URL;?>dashboard/deleteTravel/<?php echo $request['return_trip'];?>/<?php echo $request['rideid'];?>/<?php echo $request['userid'];?>/<?php echo $request['ride_type'];?>">
                                                                                                        Delete
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>

                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                            <?php } else { ?>
                                                    <p>You have not posted any ride requests</p>
                                            <?php } ?>
                                        </div>
                                        <!--booked-->
                                        <div class="tab-pane" id="bookedPassenger" role="tabpanel">
                                            <?php if(count($this->upcomingBkdTrips_P) > 0) {?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless table-sm">
                                                                        <thead>
                                                                            <th>Driver</th>
                                                                            <th>From</th>
                                                                            <th>To</th>
                                                                            <th>When</th>
                                                                            <th>Contribution</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($this->upcomingBkdTrips_P as $trip_P) { ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <?php echo $trip_P['driver_name'];?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $trip_P['departure_from'];?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $trip_P['destination'];?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $trip_P['departure_date'];?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $trip_P['contribution_per_head'];?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <!-- <div class="dropdown-container">
                                                                                            <button class="btn btn-default btn-square btn-sm dropdown-toggle" data-toggle="dropdown" role="button"
                                                                                                aria-haspopup="true" aria-expanded="false" id="IndexActionMenu">
                                                                                                Actions
                                                                                            </button>
                                                                                            <div class="dropdown-menu" aria-labelledby="IndexActionMenu" role="menu">
                                                                                                <a class="dropdown-item" 
                                                                                                href="<?php echo URL;?>dashboard/View_Offer_Details/<?php echo $trip['rideid'];?>/<?php echo $trip['userid'];?>/<?php echo $trip['ride_type'];?>?view=view-offer-post&as=p">
                                                                                                    View Details
                                                                                                </a>
                                                                                                <a class="dropdown-item" 
                                                                                                href="<?php echo URL;?>dashboard/deleteTravel/<?php echo $offer['return_trip'];?>/<?php echo $offer['rideid'];?>/<?php echo $offer['userid'];?>/<?php echo $offer['ride_type'];?>">
                                                                                                    Delete
                                                                                                </a>
                                                                                            </div> -->
                                                                                            <a class="btn btn-sm btn-square btn-default" 
                                                                                                href="<?php echo URL;?>dashboard/View_Offer_Details/<?php echo $trip_P['rideid'];?>/<?php echo $trip_P['driverid'];?>/O?view=view-offer-post&as=p">
                                                                                                    View Details
                                                                                            </a>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {echo 'empty';} ?>
                                        </div>
                                        <!--club--> 
                                        <div class="tab-pane" id="clubPassenger" role="tabpanel">
                                            <?php if(count($this->club_P) > 0) { ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless table-sm">
                                                                        <thead>
                                                                            <th>Driver</th>
                                                                            <th>Start Date</th>
                                                                            <th>From</th>
                                                                            <th>To</th>
                                                                            <th>Contribution</th>
                                                                            <th>Depature Time</th>
                                                                            <th>Return Time</th>
                                                                            <th></th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($this->club_P as $club) { ?> 
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?php echo $club['driver_name'];?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo date('d M Y', strtotime($club['departure_date']));?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $club['departure_from'];?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $club['destination'];?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $club['contribution_per_head'];?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo date('H:i', strtotime($club['departure_time']));?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo date('H:i', strtotime($club['return_time']));?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="#" class="btn btn-sm btn-default btn-square">
                                                                                                View Details
                                                                                            </a>
                                                                                            <a href="#" class="btn btn-sm btn-square btn-outline-danger">
                                                                                                Leave Club
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
                                                </div>
                                            <?php } else {echo "no active clubs";} ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                
                    


                    
                <?php } ?>

                <!--OFFER CARDS-->
                <!--large screens-->
                <div class="row max mt-3">
                    <!--large screens-->
                    <!-- offer a ride -->
                    <div class="col-xs-12 col-md-6 d-none d-md-block">
                        <div class="card card-ride text-center">
                            <div class="card-body">
                                <h6 class="card-title font-weight-bold mb-2">Own a car?</h6>
                                <hr />
                                <p class="card-text lead">
                                    Post a lift offer to members part of our community who are
                                    going the same way and share the costs for your travels
                                </p>
                                <a href="<?php echo URL; ?>dashboard/offer_Ride" class="btn btn-outline-danger btn-round">
                                    POST A RIDE
                                </a>
                                <a href="<?php echo URL; ?>dashboard/find_Ride?role=d" class="btn btn-outline-danger btn-round">
                                    FIND A PASSENGER
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- find a ride -->
                    <div class="col-xs-12 col-md-6 d-none d-md-block">
                        <div class="card card-ride text-center">
                            <div class="card-body">
                                <h6 class="card-title font-weight-bold mb-2">Need a ride?</h6>
                                <hr />
                                <p class="card-text lead">
                                    Going somewhere and need a ride? Post a request and share the costs for the trip
                                    and travel in comfort
                                </p>
                                <a href="<?php echo URL;?>dashboard/frmPostRequest" class="btn btn-outline-danger btn-round">
                                    POST A REQUEST
                                </a>
                                <a href="<?php echo URL; ?>dashboard/find_Ride?role=p" class="btn btn-outline-danger btn-round">
                                    FIND A DRIVER
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--small screens-->
                    <div class="col-12 d-sm-block d-md-none">
                        <div class="card card-ride text-center">
                            <div class="card-body">
                                <h6 class="card-title font-weight-bold mb-2">Going Somewhere ?</h6>
                                <hr />
                                <p class="card-text lead">
                                    Lessen your costs by offering lifts to our members and offer a ride<br>
                                    <a href="<?php echo URL; ?>dashboard/offer_Ride" class="btn btn-outline-danger btn-round">
                                        OFFER A RIDE
                                    </a>
                                </p>
                                <hr />
                                <p class="card-text">
                                    Post a request and share costs for the trip while travelling in comfort<br>
                                    <a href="<?php echo URL; ?>dashboard/find_Ride" class="btn btn-outline-danger btn-round">
                                        FIND A RIDE
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end cards -->
        </div>
    </div>
</div>