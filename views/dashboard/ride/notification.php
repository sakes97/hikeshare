<div class="section profile-content">
    <div class="container">
        <?php if($_GET['as'] == 'd') { 
                //driver
                if($_GET['view'] == 'response-noti'){
                    if($_GET['status'] == 'Accepted'){
        ?>
                    <!-- driver accepted request notification-->
                    <div class="row">
                        <div class="col-12">
                            <h1>Driver has accepted users request</h1>
                            <h3>Message user to start a conversation</h3>
                        </div>
                    </div>


            <?php 
                    }
                } 
            ?>
        <?php } else if($_GET['as'] == 'p') {
            //passenger
            if($_GET['view'] == 'request-noti'){
                if($_GET['status'] == 'success') { 
        ?>
                <!-- successful request --> 
                <h1>Successful request. Please wait for driver to accept or decline your request. You will be notified shortly</h1>

            <?php 
                    } 
                }else if($_GET['view']=='offer-noti'){
                    if($_GET['status']=='Accepted'){
            ?>
                    <!-- passenger accepted drivers offer --> 
                    <div class="row">
                        <div class="col-12">
                            <h1>Passenger has accepted drivers offer</h1>
                            <h3>Message the driver to start a conversation</h3>
                        </div>
                    </div>
                    
            <?php 
                    }
                }
            ?>


        <?php } ?>
        
    </div>
</div>