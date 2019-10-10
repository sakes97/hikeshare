<div class="section profile-content">
    <div class="container">
        <?php if($_GET['role'] == 'driver') { ?>
            <!-- view as a driver -->
            <h3>matching results for this driver</h3>
            <?php
                /**
                 * (FOR DRIVER)
                 * filter array to return matching results of passengers travelling to similar destination in
                 * the same current city
                 */
                $this->res_any = array_filter($this->res_any, function($input){
                    return $input['ride_as'] == 'P';
                });
            ?>
            <p>Matching Results (<?php echo count($this->res_any); ?>)</p>


        <?php } else if($_GET['role'] == 'passenger') { ?>
            <!-- view as a passsenger -->
            <h3>matching results for this passenger</h3>
            <?php 
                /**
                 * (FOR PASSENGER)
                 * filter array to return matching results of drivers travelling to similar destination in
                 * the same current city
                 */
                $this->res_any = array_filter($this->res_any, function($input){
                    return $input['ride_as'] == 'P';
                });
            ?>
            <p>Matching Results (<?php echo count($this->res_any); ?>)</p>
        <?php } ?>
    </div>
</div>