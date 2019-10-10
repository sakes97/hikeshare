<div class="section profile-content">
    <div class="container">
        <?php if ($_GET['role'] == 'driver') { ?>
            <!-- view as a driver -->
            <h3>matching results for this driver</h3>
            <?php
                /**
                 * (FOR DRIVER)
                 * filter array to return matching results of passengers travelling to similar destination in
                 * the same current city
                 */
                $this->res_any = array_filter($this->res_any, function ($input) {
                    return $input['ride_as'] == 'P';
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
                                </td>
                                <td>
                                    <a class="btn btn-default btn-square btn-sm" href="<?php echo URL; ?>dashboard/frmViewBooking/<?php echo $any['userid'];?>/<?php echo $any['rideid'];?>/<?php echo $any['ride_type'];?>/<?php echo $any['return_trip'];?>?view=view-booking-post&as=d">
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
                    return $input['ride_as'] == 'D';
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
                                    <button class="btn btn-default btn-square btn-sm" type="button" data-toggle="modal" data-target="#seats_for">
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


        <!-- seats for modal --> 
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
                        <form method="post" action="#">
                            <div class="form-row">
                                <div class="form-group col-12 mr-auto ml-auto text-center">
                                    <label>Please Select Number Of Seats</label>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>