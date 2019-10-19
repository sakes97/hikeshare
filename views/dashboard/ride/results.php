<div class="section profile-content">
    <div class="container-fluid">
        <!-- driver -->
        <?php if ($_GET['role'] == 'driver') { ?>
            <h3 class="mb-3">matching results for this driver</h3>

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
                <p>Matching Results (<?php echo count($this->res_any); ?>)</p>
                <div class="table-responsive">
                    <table class="table table-borderless table-sm">
                        <thead>
                            <th>Passenger</th>
                            <th>From</th>
                            <th>To</th>
                            <th>When</th>
                            <th colspan="2">Status</th>
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
                                    <td>
                                        <a class="btn btn-sm btn-square btn-success">
                                            <?php echo $any['status']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/request/<?php echo $any['rideid']; ?>/<?php echo $this->user['userid']; ?>/<?php echo $_GET['for']; ?>">
                                            Offer ride
                                        </a>
                                        <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/frmViewBooking/<?php echo $any['userid']; ?>/<?php echo $any['rideid']; ?>/<?php echo $any['ride_type']; ?>/<?php echo $any['return_trip']; ?>?view=view-booking-post&as=d&for=<?php echo $_GET['for']; ?>">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
            <h3>matching results for this passenger</h3>
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
                <p>Matching Results (<?php echo count($this->res_any); ?>)</p>
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
            <?php } else { ?>


                <div class="row">

                    <div id="results-map" class="col-md-6 card card-body">
                        <p>Map</p>
                    </div>

                    <div class="col-sm-12 col-md-6">
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