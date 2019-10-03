<div class="section profile-content">
    <div class="container">
        <h3>Offer Details</h3>
        <?php if ($_GET['as'] == "driver-view-offer") { ?>
            <div class="row pt-1">
                <div class="col-12">
                    <img class="img-responsive" style="width:100%;" src="<?php echo URL; ?>public/images/dummy.png" alt="Dummy Map">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-4">
                    <h5>From:<?php echo $this->rideOffer['departure_from'];?></h5>
                </div>
                <div class="col-4">
                    <h5>To:<?php echo $this->rideOffer['destination'];?></h5>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-1 m-1">
                    <a class="btn btn-default btn-square" href="#">
                        Edit
                    </a>
                </div>
                <div class="col-1 m-1">
                    <a class="btn btn-default btn-square" href="#">
                        Delete
                    </a>
                </div>
                <div class="col-2 m-1">
                    <a class="btn btn-default" href="#">
                        Find Matches
                    </a>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-2">
                    <i class="far fa-calendar-alt fa-5x"></i><br>
                    <p><?php echo date("D, dS F Y", strtotime($this->rideOffer['departure_date'])); ?></p>
                </div>
                <div class="col-2">
                    <i class="far fa-clock fa-5x"></i>
                    <p><?php echo date("H:i a", strtotime($this->rideOffer['departure_time'])); ?></p>
                </div>
            </div>
            <div class="row pt-1">
                <div class="col-12">
                    <h4>Who will be driving?</h4>
                    <p><?php echo $this->user['firstname']; ?></p>
                </div>
                <div class="col-12">
                    <h4>Vehicle</h4>
                    <p><?php echo $this->rideOffer['make']; ?></p>
                </div>
            </div>
            <div class="row pt-1">
                <div class="col-12">
                    <h4><?php echo $this->user['firstname']. "'s";?> Rules</h4>
                    <?php
                        $smoking = $this->user['smoking_yn'];
                        $alcohol = $this->user['alcohol_yn'];
                        $pets = $this->user['pets_yn'];

                        //smoking preference
                        if ($smoking == 'N' || $smoking == NULL) {
                            echo '<img class="img-responsive img-square preference-img" alt="No Smoking" src="' . URL . 'public/images/icons/smoking/no-smoking.png" 
                                    data-toggle="tooltip" data-placement="top" title="No Smoking Allowed"/>';
                        } else if ($smoking == 'Y') {
                            echo '<img class="img-responsive img-square preference-img" alt="Smoking allowed" src="' . URL . 'public/images/icons/smoking/smoking.png" 
                                    data-toggle="tooltip" data-placement="top" title="Smoking Is Permitted"/>';
                        } else {
                            echo 'No smoking,';
                        }

                        //alchohol preference
                        if ($alcohol == 'N' || $alcohol == NULL) {
                            echo '<img class="img-responsive img-square preference-img" alt="No Alcohol" src="' . URL . 'public/images/icons/alcohol/no-alcohol.png" 
                                    data-toggle="tooltip" data-placement="top" title="No Drinking Is Allowed"/>';
                        } else if ($alcohol == 'Y') {
                            echo '<img class="img-responsive img-square preference-img" alt="Alcohol Allowed" src="' . URL . 'public/images/icons/alcohol/alcohol.png" 
                                    data-toggle="tooltip" data-placement="top" title="Drinking Is Permitted" />';
                        } else {
                            echo 'No alcohol,';
                        }

                        //pets preference
                        if ($pets == 'N' || $pets == NULL) {
                            echo '<img class="img-responsive img-square preference-img" alt="No Pets" src="' . URL . 'public/images/icons/pets/no-pets.jpg" 
                                    data-toggle="tooltip" data-placement="top" title="No Pets Allowed" />';
                        } else if ($pets == 'Y') {
                            echo '<img class="img-responsive img-square preference-img" alt="Pets Allowed" src="' . URL . 'public/images/icons/pets/pets.jpg" 
                                    data-toggle="tooltip" data-placement="top" title="Pets Are Allowed" />';
                        } else {
                            echo 'No pets';
                        }
                        ?>
                </div>
            </div>
            <div class="row pt-1">
                <div class="col-12">
                    <h4>Share this journey</h4>
                </div>
                <div class="col-1">
                    <button class="btn btn-neutral btn-facebook btn-just-icon" type="button">
                        <i class="fab fa-facebook-square"></i>
                    </button>
                </div>
                <div class="col-1">
                    <button class="btn btn-neutral btn-google btn-just-icon" type="button">
                        <i class="fab fa-google-plus-g"></i>
                    </button>
                </div>
                <div class="col-1">
                    <button class="btn btn-neutral btn-twitter btn-just-icon" type="button">
                        <i class="fab fa-twitter"></i>
                    </button>
                </div>
            </div>
        <?php } ?>
    </div>
</div>