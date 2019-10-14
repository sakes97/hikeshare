<div class="section profile-content">
    <div class="container">

        <!--view users conversations-->
        <?php if($_GET['view'] === 'conv-all'){?>
            
            
            <div class="row">
                <div class="col-12">

                    <h1>Conversations</h1>

                    <div class="table-responsive">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <?php foreach($this->conversations as $convo) { ?>
                                    <tr>
                                        <td>bubble</td>
                                        <td>profile picture</td>
                                        <td><?php echo $convo['firstname'];?></td>
                                        <td>
                                            <a href="<?php echo URL;?>dashboard/frmMessages/''/''/<?php echo $convo['conversationid'];?>?view=user-chat">
                                                View
                                            </a>
                                        </td>
                                        <td>X</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>




        <!--view specific conversation-->            
        <?php } else if ($_GET['view'] === 'user-chat') {?>

            <div class="row">
                <div class="col-12">

                    <h5>Your conversation with user</h5>

                    <div class="chat">
                        <div class="messages">
                        </div>

                        <textarea class="entry" placeholder="type here and hit return"></textarea>


                    </div>
                    
                </div>
            </div>
        
        <?php } ?>


    </div>
</div>