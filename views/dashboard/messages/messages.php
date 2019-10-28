<div class="section profile-content">
    <div class="container">

        <!--view users conversations-->
        <?php if($_GET['view'] == 'conv-all'){?>
            
            
            <div class="row">
                <div class="col-12">

                    <h2 class="text-center">Conversations</h2>

                    <div class="table-responsive">
                        <table class="table table-borderless table-sm">
                            <thead>
                                <th>Member</th>
                            </thead>
                            <tbody>
                                <?php foreach($this->conversations as $c) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $c['Member_Name'];?>
                                        </td>
                                        <td>
                                            <a href="<?php echo URL;?>dashboard/frmMessages/''/<?php echo $c['conversationid'];?>?view=user-chat&mem=<?php echo $c['Member_ID'];?>">
                                                View Messages
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

                    <h2 class="text-center">User Conversation</h2>

                    <div class="row">
                        <div class="col-sm-12 col-md-8 mr-auto ml-auto">
                            <div class="card card-body ">
                                <div id="chat_container">
                                                
                                    <div id="chat_box">
                                        <div id="chat_data">
                                            <?php foreach($this->messages as $m) { ?>
                                                <div class="outgoing_msg">
                                                    <p>
                                                        <span class="sender_name"><?php echo $m['Sender_Name'];?></span>
                                                        <br>
                                                        <span class="msg"><?php echo $m['msg'];?></span>
                                                        <br>
                                                        <span class="text_date" style="float:right;">
                                                            <?php 
                                                                echo date('d M, H:i',strtotime($m['sent_datetime']));
                                                            ?>
                                                        </span>
                                                    </p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    


                                </div>

                                <div class="type_msg mt-3">
                                    <form method="post" action="<?php echo URL;?>dashboard/sendMessage">
                                        <?php if(count($this->messages) > 0 && !empty($this->messages)) { ?>
                                            <input type="hidden" name="conversationid" id="conversationid" value="<?php echo $this->messages[0]['conversationid']?>">
                                        <?php } ?>

                                        <input type="hidden" name="senderid" id="senderid" value="<?php echo $this->user['userid'];?>">
                                        <input type="hidden" name="recipientid" id="recipientid" value="<?php echo $_GET['mem'];?>">
                                        
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-8 m-1">
                                                <textarea class="form-control" name="msg" id="msg" placeholder="Enter Your Message..."  rows="2"></textarea><br>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 m-1">
                                                <button class="btn btn-danger btn-rounded btn-sm" type="submit">
                                                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                                    Send 
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        
        <?php } ?>


    </div>
</div>