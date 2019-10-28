<div class="section profile-content">
    <div class="container">
        <h1>Ride History</h1>


        <div class="row">
            <div class="col-12">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <!-- wrapper nav -->
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#liftsOffered">
                                    Lifts as driver
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#ridesBooked">
                                    Lifts as passenger
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <!-- tab - content -->
                <div id="my-tab-content" class="tab-content">
                    
                    <!--past lifts-->
                    <div class="tab-pane active" id="liftsOffered" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12">
                                    <?php 
                                        if(!empty($this->pastOffers)){
                                            $this->pastOffers = array_filter($this->pastOffers, function($input){
                                                return $input['ride_as'] == 'D';
                                            });
                                        }
                                    ?>
                                    <?php if(!empty($this->pastOffers) && count($this->pastOffers) > 0) { ?>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-md">
                                                <thead>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>When</th>
                                                    <th colspan="2">Status</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($this->pastOffers as $p) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $p['departure_from']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $p['destination']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $p['departure_date']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $p['status'];?>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm btn-default btn-square" 
                                                                href="<?php echo URL;?>dashboard/View_Offer_Details/<?php echo $p['rideid'];?>/<?php echo $p['userid'];?>/<?php echo $p['ride_type']?>?view=view-offer-post&as=d">
                                                                    View Details
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } else { ?>
                                        <h6>No past trips as a driver</h6>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--booking content-->
                    <div class="tab-pane" id="ridesBooked" role="tabpanel">
                        <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <?php if(!empty($this->myPastBookings) && count($this->myPastBookings) > 0) { ?>
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-md">
                                                    <thead>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>When</th>
                                                        <th colspan="2">Status</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($this->myPastBookings as $p) { ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $p['departure_from']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $p['destination']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $p['departure_date']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $p['status'];?>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-default btn-square" 
                                                                    href="<?php echo URL;?>dashboard/View_Offer_Details/<?php echo $p['rideid'];?>/<?php echo $p['userid'];?>/<?php echo $p['ride_type']?>?view=view-offer-post&as=p">
                                                                        View Details
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } else { ?>
                                            <h6>No past trips as a passenger</h6>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>