<div class="section profile-content">
    <div class="container">

        <!--view users conversations-->
        <?php if($_GET['view'] == 'conv-all'){?>
            
            
            <div class="row">
                <div class="col-12">

                    <h1>Conversations</h1>

                    <div class="table-responsive">
                        <table class="table table-borderless table-md">
                            <thead>
                                <th colspan="2">Member</th>
                            </thead>
                            <tbody>
                                <?php foreach($this->conversations as $c) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $c['Member_Name'];?>
                                        </td>
                                        <td>
                                            <a href="<?php echo URL;?>dashboard/frmMessages/''/<?php echo $c['conversationid'];?>?view=user-chat&mem=<?php echo $c['Member_ID'];?>">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>




        <!--view specific conversation-->            
        <?php } else if ($_GET['view'] == 'user-chat') {?>

            <div class="row">
                <div class="col-12">

                    <h5>Your conversation with user</h5>

                    <div id="chat_container">
                                    
                        <div id="chat_box">
                            <div id="chat_data">
                                <?php foreach($this->messages as $m) { ?>
                                    <p style="color:green;">
                                        <?php echo $m['Sender_Name'];?>
                                    </p>
                                    <p style="color:brown;">
                                        <?php echo $m['msg'];?>
                                    </p>
                                    <p style="">
                                        <?php echo $m['sent_datetime'];?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>

                        <form method="post" action="<?php echo URL;?>dashboard/sendMessage">
                            <?php if(count($this->messages) > 0 && !empty($this->messages)) { ?>
                                <input type="hidden" name="conversationid" id="conversationid" value="<?php echo $this->messages[0]['conversationid']?>">
                            <?php } ?>

                            <input type="hidden" name="senderid" id="senderid" value="<?php echo $this->user['userid'];?>">
                            <input type="hidden" name="recipientid" id="recipientid" value="<?php echo $_GET['mem'];?>">
                            
                            <textarea name="msg" id="msg" placeholder="Enter Your Message..." cols="60" rows="5"></textarea><br>

                            <button class="btn btn-danger btn-rounded btn-sm" type="submit">
                                Send Message
                            </button>

                        </form>


                    </div>
                    
                </div>
            </div>
        
        <?php } ?>


    </div>
</div>