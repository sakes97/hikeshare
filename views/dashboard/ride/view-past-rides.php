<div class="section profile-content">
    <div class="container">
        <h1>View Past Rides</h1>


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
                    <div class="tab-pane active" id="liftsOffered" role="tabpanel">
                        <p>These are your lifts offered</p>
                        <div class="row">
                            <div class="col-12 d-none d-md-block">
                                <table class="table table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>When</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($this->offers as $offers){ ?>
                                            <tr>
                                                <td>
                                                    #
                                                </td>
                                                <td>
                                                    <?php echo $offers['departure_from'];?>
                                                </td>
                                                <td>
                                                    <?php echo $offers['destination'];?>
                                                </td>
                                                <td>
                                                    <?php echo $offers['departure_date'];?>
                                                </td>
                                                <td>
                                                    <?php echo $offers['status'];?>
                                                </td>
                                                <td>
                                                    <p>--Actions dropdown</p>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 d-sm-block d-md-none">
                                <p>Smaller screens</p>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="ridesBooked" role="tabpanel">
                        <p>These are the rides you booked</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>