<div class="section profile-content">
    <div class="container">
        <?php if($_GET['as'] == 'driver') { ?>

        <?php } else if($_GET['as'] == 'passenger') {
            if($_GET['request'] == 'success') { ?>
            <!-- successful request --> 
            <h1>Successful request. Please wait for driver to accept or decline your request. You will be notified shortly</h1>

            <?php } ?>

        <?php } ?>
        
    </div>
</div>