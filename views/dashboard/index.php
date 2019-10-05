<div class="section profile-content">
    <div class="container bg-white shadow-sm pb-2 border-bottom-0">
        <div class="row">
            <!-- owner -->
            <div class="col-sm-12 col-lg-4 text-center">
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

            <!-- ride cards -->
            <div class="col-sm-12 col-lg-8">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="nav-tabs-navigation pb-0 mb-0">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#liftsOffered">
                                            Lifts Offered
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#ridesBooked">
                                            Ride Bookings
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($this->NUM_OF_ACTIVE_OFFERS['NUM_OF_ACTIVE_OFFERS'] > 0) { ?>
                    <div id="dash-tab-content" class="tab-content">
                        <!--lift content-->
                        <div class="tab-pane active" id="liftsOffered" role="tabpanel">
                            <div class="row max mt-3">
                                <div class="col-12 m-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>When</th>
                                                        <th>Actions</th>
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
                                                                    <a class="btn btn-default btn-square btn-sm" 
                                                                    href="<?php echo URL;?>dashboard/View_Offer_Details/<?php echo $offer['rideid'];?>/<?php echo $offer['userid'];?>/<?php echo $offer['ride_type'];?>?as=driver-view-offer">
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
                        </div>
                        <!--bookings content-->
                        <div class="tab-pane" id="ridesBooked" role="tabpanel">
                            <p>These are the rides you booked</p>
                        </div>
                    </div>

                <?php } else { ?>
                    <div class="dash-tab-content" class="tab-content">
                        <!--lift content-->
                        <div class="tab-pane active" id="liftsOffered" role="tabpanel">
                            <div class="row  max mt-3">
                                <h4>No Ride Offers</h4>
                            </div>
                        </div>
                        <!--bookings content-->
                        <div class="tab-pane" id="ridesBooked" role="tabpanel">
                            <p>These are the rides you booked</p>
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
                                <a href="#" class="btn btn-outline-danger btn-round">
                                    FIND REQUESTS
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
                                <a href="<?php echo URL; ?>dashboard/find_Ride" class="btn btn-outline-danger btn-round">
                                    FIND A RIDE
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