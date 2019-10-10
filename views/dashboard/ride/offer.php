<div class="section profile-content">
    <div class="container">
        <h2>Offer a ride</h2>
        <div class="row max py-1">
            <!-- google Maps -->
            <div id="map" class="col-sm-12 col-md-6 shadow-sm">
            </div>
            <!-- end google maps -->

            <!-- enter Trip Details -->
            <div class="col-sm-12 col-md-6">
                <h6>Enter Your Trip Details</h6>
                <form method="post" action="<?php echo URL; ?>dashboard/offerRide/<?php echo $this->user['userid']; ?>">
                    <!-- trip frequency -->
                    <div class="form-row">
                        <div class="form-group col-sm-10 col-md-6 p-1">
                            <label for="ride_type">Trip frequency</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="once_option" name="ride_type" value="O" checked>
                                <label class="custom-control-label" for="once_option">Once-Off</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="regular_option" name="ride_type" value="R">
                                <label class="custom-control-label" for="regular_option">Regular</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 p-1" id="rideDays" style="display:none;">
                            <label>Schedule Days</label>
                            <br />
                            <?php foreach ($this->days as $day) { ?>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input days_check" id="<?php echo $day['dow']; ?>" name="days_checklist[]" value="<?php echo $day['dayid']; ?>">
                                    <label class="custom-control-label" for="<?php echo $day['dow']; ?>">
                                        <?php echo $day['dow']; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- end trip frequency -->
                    <!-- from -->
                    <div class="form-row">
                        <div class="form-group col-sm-10 col-md-9 p-1">
                            <label for="origin-input">From</label>
                            <input type="text" class="form-control" id="origin-input" name="origin-input" placeholder="Enter your current city...">
                        </div>
                    </div>
                    <!-- end from -->
                    <!-- destination -->
                    <div class="form-row">
                        <div class="form-group col-sm-10 col-md-9 p-1">
                            <label for="destination-input">To</label>
                            <input type="text" class="form-control" id="destination-input" name="destination-input" placeholder="Enter destination city...">
                        </div>
                    </div>
                    <!-- end destination -->
                    <!-- return switch -->
                    <div class="form-row" id="dvReturnSwitch">
                        <div class="form-group col-sm-10 col-md-4 p-1">
                            <label>Will You Be Returning?</label>
                            <input type="checkbox" data-toggle="switch"  data-on-color="danger" data-off-color="secondary" data-on-text="YES" data-off-text="NO"
                            id="return_trip_switch">
                            <span class="toggle switch-toggler"></span>
                            <input type="hidden" value="N" name="return_trip" id="return_trip">
                        </div>
                    </div>
                    <!-- end return switch -->
                    <!-- travel schedule -->
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 p-1">
                            <label id="lblDepartureDate" class="label-control" for="departure_date">Departure Date</label>
                            <input type="text" class="form-control datepicker" name="departure_date" id="departure_date" placeholder="Choose departure date..." onkeypress="return false;" />
                        </div>
                        <div class="form-group col-sm-12 col-md-6 p-1" id="dvReturnDate" style="display:none;">
                            <label id="lblReturnDate" class="label-control" for="return_date">Return Date</label>
                            <input type="text" class="form-control datepicker" name="return_date" id="return_date" placeholder="Choose return date..." onkeypress="return false;" />
                        </div>
                    </div>
                    <!-- time -->
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 p-1" id="dvDepartureTime">
                            <label id="lblDepartureTime" class="label-control" for="inputTime">Departure Time</label>
                            <input type="text" class="form-control timepicker" name="departure_time" id="departure_time" placeholder="Departure Time" onkeypress="return false;">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 p-1" id="dvReturnTime" style="display:none;">
                            <label id="lblReturnTime" class="label-control" for="return_time">Return Time</label>
                            <input type="text" class="form-control timepicker" name="return_time" id="return_time" placeholder="Return Time" onkeypress="return false;" />
                        </div>
                    </div>
                    <!-- end travel scheule -->
                    <!-- contribution/available-seats -->
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 p-1">
                            <div class="form-group col-sm-12 col-md-10 p-1">
                                <?php

                                if (count($this->cars) > 0) {
                                    ?>
                                    <label for="car_for_ride">Choose:</label>
                                    <select name="car_for_ride" class="form-control form-control-sm" id="car_for_ride">
                                        <?php foreach ($this->cars as $cars) { ?>
                                            <option id="<?php echo $cars['carid']; ?>" value="<?php echo $cars['carid']; ?>">
                                                <?php echo $cars['make']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                <?php } else { ?>
                                    <button type="button" data-toggle="modal" class="btn btn-default btn-square" data-target="#addCarModal">
                                        Add Car
                                    </button>
                                    <span class="p-1">
                                        <i class="fas fa-question-circle tooltip_icon" data-toggle="tooltip" data-placement="right" title="Car needs to be added before ride can be made"></i>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 p-1">
                            <label for="contribution_per_head">Trip Contribution</label>
                            <input class="form-control" type="number" value="100" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" name="contribution_per_head" id="contribution_per_head">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 p-1">
                            <label for="seats_available">Available Seats</label>
                            <input class="form-control" type="number" value="3" min="1" name="seats_available" id="seats_available">
                        </div>
                    </div>
                    <!-- end contribution/available-seats -->
                    <!-- extra details -->
                    <div class="form-row">
                        <div class="form-group col-12 p-1">
                            <label for="extra_details">Extra Details/Instructions (optional) </label>
                            <textarea class="form-control" id="extra_details" name="extra_details" rows="4"></textarea>
                        </div>
                    </div>
                    <!-- end extra details -->
                    <div class="form-row">
                        <button type="submit" class="btn btn-danger btn-round">OFFER RIDE</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end trip details -->

        <!-- Add Car Modal -->
        <div class="modal fade" id="addCarModal" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-register">
                <div class="modal-content">
                    <div class="modal-header no-border-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6 class="text-muted text-center">Add Car</h6>
                    </div>
                    <div class="modal-body">
                        <form>
                            <!-- car image -->
                            <div class="form-group mr-auto ml-auto text-center">
                                <div id="image_contain">
                                    <img id="image-upload" align="middle" class="img-square img-no-padding img-responsive offer_add_car_modal" src="<?php echo URL; ?>public/images/hikeshare-logo.png" alt="Car Image" title='' />
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <input type="file" id="inputGroupFile01" class="form-control imgInp custom-file-input" aria-describedby="inputGroupFile01" name="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                            </div>
                            <!-- end car image -->

                            <!-- registration number -->
                            <div class="form-row">
                                <div class="form-group col-sx-12 col-md-8">
                                    <label for="registration_number">Registration Number</label>
                                    <input type="text" class="form-control" name="registration_number" id="registration_number" placeholder="Registration Number">
                                </div>
                            </div>
                            <!-- end registration number -->

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="make">Make</label>
                                    <input name="make" id="make" class="form-control" type="text" placeholder="Make">
                                </div>
                                <div class="form-group col-6">
                                    <label for="model">Model</label>
                                    <input type="text" class="form-control" name="model" id="model" placeholder="Model">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-xs-12 col-md-5">
                                    <label for="model_year" class="label-control">Model Year</label>
                                    <input type="text" class="form-control datepicker_year" name="model_year" id="model_year" placeholder="Model Year">
                                </div>
                                <div class="form-group col-xs-12 col-md-7">
                                    <label for="number_of_seats">No. Seats (Excl. Driver Seat)</label>
                                    <input class="form-control" type="number" min="1" max="16" name="number_of_seats" id="number_of_seats">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="mr-auto ml-auto pb-3">
                                    <input type="submit" class="btn btn-outline-danger btn-round" value="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Add Car Modal -->
    </div>
</div>