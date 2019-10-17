<div class="section profile-content">
    <div class="container shadow-sm">
       
        <?php if($_GET['role'] == 'p') { ?>
            <h4>Find a driver</h4>
            <!--large screens view-->
            <div class="row">
                <!--user enter details-->
                <div class="col-sm-12 col-md-6 mt-1 border-right">
                    <h6>Where are you heading?</h6>
                    <form method="post" action="<?php echo URL;?>dashboard/find_Ride?role=p&action=search-ride">
                        <!-- <input type="hidden" name="action" value="find-a-ride"/> -->
                        <div class="form-row">
                            <div class="form-group col-sm-10 col-md-6 p-1">
                                <label for="origin-input">From</label>
                                <input type="text" class="form-control" id="origin-input" name="origin-input" 
                                <?php if(isset($_GET['from'])) {?>
                                    placeholder="<?php echo $_GET['origin-input'];?>"
                                <?php } else { ?>
                                    placeholder="Enter departure from..."
                                <?php } ?>
                                >
                            </div>
                            <div class="form-group col-sm-10 col-md-6 p-1">
                                <label for="destination-input">To</label>
                                <input type="text" class="form-control" id="destination-input" name="destination-input"
                                <?php if(isset($_GET['to'])) {?>
                                    placeholder="<?php echo $_GET['destination-input'];?>"
                                <?php } else { ?>
                                    placeholder="Enter your destination..."
                                <?php } ?>
                                >
                            </div>
                        </div>
                        <!-- <div class="form-row" id="dv_lift_departure">
                            <div class="form-group col-sm-8 col-md-6 p-1">
                                <label id="lift_departure_date" for="departure_date">Departure Date</label>
                                <input type="text" class="form-control datepicker" name="departure_date" id="departure_date" placeholder="<?php echo date('Y-m-d');?>" onkeypress="return false;" />
                            </div>
                        </div> -->
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-4 p-1">
                                <button class="btn btn-outline-warning btn-round" type="submit">
                                    find a ride
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--results matches-->
                <div class="col-sm-12 col-md-6 mt-1">
                    <h6>Matching Rides</h6>
                    <?php if(isset($this->res_any)) { ?>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead class="border-bottom">
                                    <tr>
                                        <td>Driver Name</td>
                                        <td>Rating</td>
                                        <td>Car</td>
                                        <td>Action<td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($this->res_any) && count($this->res_any) > 0) { ?>
                                        <?php foreach($this->res_any as $res) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $res['firstname'] . ' ' . $res['lastname'];?>
                                            </td>
                                            <td>
                                                {rating}
                                            </td>
                                            <td>
                                                {car_name}
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-round btn-outline-danger m-1">
                                                    Message
                                                </a>
                                                <a href="#" class="btn btn-sm btn-round btn-outline-danger  m-1">
                                                    View profile
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tr>
                                </tr>
                            </table>
                        </div>
                    <?php }else { ?>
                        <p>No matching results. Post a request</p>
                    <?php } ?>
                </div>
            </div>




        <?php } else if($_GET['role'] == 'd') { ?>
            <h4>Find a passenger</h4>
            <div class="row">

            </div>


        <?php } ?>



    </div>
</div>