<div class="section profile-content">
    <div class="container">
        <h1>Ride History</h1>


        <div class="row">
            <div class="col-12">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#liftsOffered">
                                    Lifts Offered
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#ridesBooked">
                                    Rides Booked
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="my-tab-content" class="tab-content">
                    <!--lift content-->
                    <div class="tab-pane active" id="liftsOffered" role="tabpanel">
                        <ul id="innerTabList" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#upcomingOffers">
                                    Upcoming
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#pastOffers">
                                    Past
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#allOffers">
                                    All
                                </a>
                            </li>
                        </ul>
                        <div class="d-inline">
                            <a class="btn btn-outline-default" href="<?php echo URL; ?>dashboard/offer_Ride">Offer a new ride</a>
                        </div>
                        <!--main content-->
                        <div id="my-inner-tab-content" class="tab-content">
                            <!--upcoming offers-->
                            <div class="tab-pane active" id="upcomingOffers" role="tabpanel">
                                <div class="row">
                                    <!--large screens-->
                                    <div class="col-12 d-none d-md-block">
                                        <?php if ($this->NUM_OF_PENDING_OFFERS['NUM_OF_PENDING_OFFERS'] > 0) {  ?>
                                            <table class="table">
                                                <thead>
                                                    <th>#</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>When</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($this->pendingOffers as $offer) { ?>
                                                        <tr>
                                                            <td>
                                                                #
                                                            </td>
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
                                                                <?php echo $offer['status']; ?>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Dropdown button
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#">Action</a>
                                                                        <a class="dropdown-item" href="#">Another action</a>
                                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } else { ?>
                                            <h6>No Upcoming Rides</h6>
                                        <?php } ?>
                                    </div>
                                    <!--smaller screens-->
                                    <div class="col-12 d-sm-block d-md-none">
                                        <?php if ($this->NUM_OF_PENDING_OFFERS['NUM_OF_PENDING_OFFERS'] > 0) {  ?>
                                            <table class="table">
                                                <?php foreach ($this->pendingOffers as $offer) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $offer['departure_from']; ?>
                                                            -
                                                            <?php echo $offer['destination']; ?>
                                                            </hr>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Date: <?php echo $offer['departure_date']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Status: <?php echo $offer['status']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Dropdown button
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                    <a class="dropdown-item" href="#">Another action</a>
                                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        <?php } else { ?>
                                            <h6>No Upcoming</h6>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!--past offers-->
                            <div class="tab-pane" id="pastOffers" role="tabpanel">
                                <!--large screens-->
                                <div class="col-12 d-none d-md-block">
                                    <?php if ($this->NUM_OF_PAST_OFFERS['NUM_OF_PAST_OFFERS'] > 0) {  ?>
                                        <table class="table">
                                            <thead>
                                                <th>#</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>When</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($this->pastOffers as $offer) { ?>
                                                    <tr>
                                                        <td>
                                                            #
                                                        </td>
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
                                                            <?php echo $offer['status']; ?>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Dropdown button
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                    <a class="dropdown-item" href="#">Another action</a>
                                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <h6>No Past Rides</h6>
                                    <?php } ?>
                                </div>
                                <!--smaller screens-->
                                <div class="col-12 d-sm-block d-md-none">
                                    <?php if ($this->NUM_OF_PENDING_OFFERS['NUM_OF_PAST_OFFERS'] > 0) {  ?>
                                        <table class="table">
                                            <?php foreach ($this->pastOffers as $offer) { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $offer['departure_from']; ?>
                                                        -
                                                        <?php echo $offer['destination']; ?>
                                                        </hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Date: <?php echo $offer['departure_date']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Status: <?php echo $offer['status']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Dropdown button
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    <?php } else { ?>
                                        <h6>No Past Rides</h6>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--all offers-->
                            <div class="tab-pane" id="allOffers" role="tabpanel">
                                <!--large screens-->
                                <div class="col-12 d-none d-md-block">
                                    <?php if ($this->offers[0]['NUM_OF_OFFERS'] > 0) {  ?>
                                        <table class="table">
                                            <thead>
                                                <th>#</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>When</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($this->offers as $offer) { ?>
                                                    <tr>
                                                        <td>
                                                            #
                                                        </td>
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
                                                            <?php echo $offer['status']; ?>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Dropdown button
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                    <a class="dropdown-item" href="#">Another action</a>
                                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <h6>No Offers Made</h6>
                                    <?php } ?>
                                </div>
                                <!--smaller screens-->
                                <div class="col-12 d-sm-block d-md-none">
                                    <?php if ($this->offers[0]['NUM_OF_OFFERS'] > 0) {  ?>
                                        <table class="table">
                                            <?php foreach ($this->offers as $offer) { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $offer['departure_from']; ?>
                                                        -
                                                        <?php echo $offer['destination']; ?>
                                                        </hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Date: <?php echo $offer['departure_date']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Status: <?php echo $offer['status']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Dropdown button
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    <?php } else { ?>
                                        <h6>No Offers Made</h6>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--booking content-->
                    <div class="tab-pane" id="ridesBooked" role="tabpanel">
                        <p>These are the rides you booked</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>