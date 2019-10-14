<div class="section profile-content">
    <div class="container">
        <!-- driver -->
        <?php if ($_GET['role'] == 'driver') { ?>            
            <h3>matching results for this driver</h3>
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
                <table class="table table-borderless table-sm">
                    <thead>
                        <th>From</th>
                        <th>To</th>
                        <th>When</th>
                    </thead>
                    <tbody>
                        <?php foreach ($this->res_any as $any) { ?>
                            <tr>
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
                                    <a class="btn btn-default btn-square btn-sm" href="#">
                                        Offer ride
                                    </a>
                                    <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/frmViewBooking/<?php echo $any['userid'];?>/<?php echo $any['rideid'];?>/<?php echo $any['ride_type'];?>/<?php echo $any['return_trip'];?>?view=view-booking-post&as=d">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            <?php } else { ?>

                <div class="row">
                
                    <div id="results-map" class="col-md-6 shadow-sm">
                        <p>Map</p>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <!-- one way -->
                        <?php if($this->rideOffer['return_trip'] == 'N') { ?>

                            <!-- trip details -->
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-md">
                                        <thead>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>When</th>
                                            <th>Seats Avail.</th>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <?php echo $this->rideOffer['departure_from'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->rideOffer['destination'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->rideOffer['departure_date'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->rideOffer['seats_available'];?>
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
                        <?php } else if($this->rideOffer['return_trip'] == 'Y') { ?>

                            <!-- trip details -->
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>When</th>
                                            <th>Seats Avail.</th>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <?php echo $this->returnTrip[0]['departure_from'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->returnTrip[0]['destination'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->returnTrip[0]['departure_date'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->returnTrip[0]['seats_available'];?>
                                        </tbody>
                                    </table>
                                </div>

                                <h5>Return Trip</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>When</th>
                                            <th>Seats Avail.</th>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <?php echo $this->returnTrip[1]['departure_from'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->returnTrip[1]['destination'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->returnTrip[1]['departure_date'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->returnTrip[1]['seats_available'];?>
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
                        <?php } else if($this->rideOffer['return_trip'] == 'U') { ?>

                            <!-- trip details -->
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-md">
                                        <thead>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>When</th>
                                            <th>Seats Avail.</th>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <?php echo $this->rideOffer['departure_from'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->rideOffer['destination'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->rideOffer['departure_date'];?>
                                            </td>
                                            <td>
                                                <?php echo $this->rideOffer['seats_available'];?>
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
                                                        foreach($this->trip_schedule as $ts){
                                                            $count--;
                                                            if($count>0)
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
                <table class="table table-borderless table-md">
                    <thead>
                        <th>From</th>
                        <th>To</th>
                        <th>When</th>
                        <th>Seats Available</th>
                    </thead>
                    <tbody>
                        <?php foreach ($this->res_any as $any) { ?>
                            <tr>
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
                                    <button class="btn btn-default btn-square btn-sm" type="button" id="btnRequest" data-toggle="modal" data-target="#seats_for"
                                        data-id="<?php echo $any['rideid'];?>">
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
            <?php } else { ?>
                <p>Currently no matching trips</p>
                <a href="<?php echo URL; ?>/dashboard/index">Home</a>
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
                        <form method="post" action="<?php echo URL;?>dashboard/request">
                            <input type="hidden" name="rideid" id="input_rideid" value="">
                            <input type="hidden" name="userid" id="input_userid" value="<?php echo $this->user['userid'];?>">
                            <div class="form-row">
                                <div class="form-group ml-auto mr-auto">
                                    <label for="seats_for">Please Select Number Of Seats</label>
                                    <input id="maxNumberTarget" placeholder="1" name="seats_for" type="number" min="???" max="???" class="form-control form-control-sm text-center">
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