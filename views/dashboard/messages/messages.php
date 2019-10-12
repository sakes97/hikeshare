<div class="section profile-content">
    <div class="container">

        <!--view users conversations-->
        <?php if($_GET['view'] == 'conv-all'){?>
            
            
            <div class="row">
                <div class="col-12">

                    <h1>Conversations</h1>


                </div>
            </div>




        <!--view specific conversation-->            
        <?php } else if ($_GET['view'] == 'user-chat') {?>

            <div class="row">
                <div class="col-12">

                    <h5>Your conversation with user</h5>
                    
                </div>
            </div>
        
        <?php } ?>


    </div>
</div>