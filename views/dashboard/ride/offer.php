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
                <form>
                    <!-- from -->
                    <div class="form-row">
                        <div class="form-group col-sm-10 col-md-9 p-1">
                            <label for="origin-input">From</label>
                            <input type="text" class="form-control" id="origin-input" name="origin-input"
                                placeholder="(address/town)">
                        </div>
                    </div>
                    <!-- end from -->
                    <!-- destination -->
                    <div class="form-row">
                        <div class="form-group col-sm-10 col-md-9 p-1">
                            <label for="destination-input">To</label>
                            <input type="text" class="form-control" id="destination-input" name="destination-input"
                                placeholder="(address/town)">
                        </div>
                    </div>
                    <!-- end destination -->
                    <!-- trip frequency -->
                    <div class="form-row">
                        <div class="form-group col-sm-10 col-md-6 p-1">
                            <label for="ride_type">Trip frequency</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="once_option" name="ride_type"
                                    value="O">
                                <label class="custom-control-label" for="once_option">Once-Off</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="regular_option" name="ride_type"
                                    value="R">
                                <label class="custom-control-label" for="regular_option">Regular</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 p-1">
                            <label>Schedule Days</label>
                            <br />
                            <?php 
                                foreach($this->days as $day){
                            ?>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="<?php echo $day['dow']; ?>"
                                    name="days_checklist[]" value="<?php echo $day['dayid']; ?>">
                                <label class="custom-control-label" for="<?php echo $day['dow']; ?>">
                                    <?php echo $day['dow']; ?></label>
                            </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <!-- end trip frequency -->
                    <!-- travel schedule -->
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 p-1">
                            <label class="label-control" for="inputDate">Departure Date</label>
                            <input type="text" class="form-control datepicker" name="inputDate" id="inputDate"
                                placeholder="" />
                        </div>
                        <div class="form-group col-sm-12 col-md-6 p-1">
                            <label class="label-control" for="inputTime">Departure Time</label>
                            <label class="label-control" for="inputTime"></label>
                            <input type="text" class="form-control timepicker" name="inputTime" id="inputTime"
                                placeholder="" />
                        </div>
                    </div>
                    <!-- end travel scheule -->
                    <!-- contribution/available-seats -->
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 p-1">
                            <label for="inputContribution">Trip Contribution</label>
                            <input class="form-control" type="number" value="100" min="0" step="0.01"
                                data-number-to-fixed="2" data-number-stepfactor="100" name="inputContribution"
                                id="inputContribution">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 p-1">
                            <label for="inputSeats">Available Seats</label>
                            <input class="form-control" type="number" value="3" min="1" name="inputSeats"
                                id="inputSeats">
                        </div>
                    </div>
                    <!-- end contribution/available-seats -->
                    <!-- pickup spot -->
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-9 p-1">
                            <label for="inputPickUp">Pick Up Spot</label>
                            <input class="form-control" type="text" name="inputPickUp" id="inputPickUp"
                                placeholder="Pick Up Spot">
                        </div>
                    </div>
                    <!-- end pickup spot-->
                    <!-- extra details -->
                    <div class="form-row">
                        <div class="form-group col-12 p-1">
                            <label for="inputExtraDetails">Extra Details/Instructions (optional) </label>
                            <textarea class="form-control" id="inputExtraDetails" name="inputExtraDetails"
                                rows="4"></textarea>
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
    </div>
</div>
</div>