<div class="section profile-content">
    <div class="container">
        <h2>Post ride request</h2>
        <div class="row max py-1">
            <!-- google Maps -->
            <div id="map" class="col-sm-12 col-md-6 shadow-sm">
            </div>

            <!-- enter Trip Details -->
            <div class="col-sm-12 col-md-6">
                <h6>Enter Your Trip Details</h6>
                <form method="post" action="<?php echo URL; ?>dashboard/offerRide/<?php echo $this->user['userid']; ?>">

                    <!-- trip frequency -->
                    <div class="form-row">
                        <div class="form-group col-sm-10 col-md-6 p-1">
                            <label for="ride_type">Ride frequency</label>
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
                    

                    <!-- from -->
                    <div class="form-row">
                        <div class="form-group col-sm-10 col-md-9 p-1">
                            <label for="origin-input">From</label>
                            <input type="text" class="form-control" id="origin-input" name="origin-input" placeholder="Enter your current city...">
                        </div>
                    </div>
                    
                    <!-- destination -->
                    <div class="form-row">
                        <div class="form-group col-sm-10 col-md-9 p-1">
                            <label for="destination-input">To</label>
                            <input type="text" class="form-control" id="destination-input" name="destination-input" placeholder="Enter destination city...">
                        </div>
                    </div>

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

                    <!-- extra details -->
                    <div class="form-row">
                        <div class="form-group col-12 p-1">
                            <label for="extra_details">Extra Details/Instructions (optional) </label>
                            <textarea class="form-control" id="extra_details" name="extra_details" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <button type="submit" class="btn btn-danger btn-round">Submit</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>