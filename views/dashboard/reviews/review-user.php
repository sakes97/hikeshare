<div class="section profile-content">
    <div class="container">

        <div class="row">


            <div class="card card-body">

                <h3 class="text-center">Review User</h3>

                <div class="owner">
                    <div class="avatar">
                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($this->u['picture']); ?>" alt="User Profile Picture" class="img-circle img-no-padding img-responsive img-circle">
                    </div>
                </div>
                

                
                <?php if(isset($_GET['status']) && $_GET['status'] == 'success') { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Success. Thank you for your review.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else if(isset($_GET['status']) && $_GET['status'] == 'fail') { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Review Unsuccessful. Please try again.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-center">Rate User</h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 mr-auto ml-auto">

                            <form method="post" action="<?php echo URL;?>dashboard/reviewUser">
                                <input type="hidden" name="rating" id="rating">
                                <input type="hidden" name="reviewerid" id="reviewerid" value="<?php echo $this->user['userid'];?>">
                                <input type="hidden" name="revieweeid" id="revieweeid" value="<?php echo $this->u['userid'];?>">
                                
                                <div class="row">
                                    <div class="mr-auto ml-auto">
                                        <i class="fa fa-star" data-index="0"></i>
                                        <i class="fa fa-star" data-index="1"></i>
                                        <i class="fa fa-star" data-index="2"></i>
                                        <i class="fa fa-star" data-index="3"></i>
                                        <i class="fa fa-star" data-index="4"></i>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <textarea type="text" class="form-control" id="review_comment" name="review_comment" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="row p-1 m-1">
                                    <div class="mx-auto">
                                        <button type="submit" class="btn btn-sm btn-round btn-danger" id="btnReviewUser">Submit</button>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="return_to" id="return_to" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" >
                            </form>
                        </div>
                    </div>


                <?php } else { ?>

                    <?php if(count($this->reviewOfUser) < 1) { ?>
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-center">Rate User</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8 mr-auto ml-auto">

                                <form method="post" action="<?php echo URL;?>dashboard/reviewUser">
                                    <input type="hidden" name="rating" id="rating">
                                    <input type="hidden" name="reviewerid" id="reviewerid" value="<?php echo $this->user['userid'];?>">
                                    <input type="hidden" name="revieweeid" id="revieweeid" value="<?php echo $this->u['userid'];?>">
                                    
                                    <div class="row">
                                        <div class="mr-auto ml-auto">
                                            <i class="fa fa-star" data-index="0"></i>
                                            <i class="fa fa-star" data-index="1"></i>
                                            <i class="fa fa-star" data-index="2"></i>
                                            <i class="fa fa-star" data-index="3"></i>
                                            <i class="fa fa-star" data-index="4"></i>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <textarea type="text" class="form-control" id="review_comment" name="review_comment" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="row p-1 m-1">
                                        <div class="mx-auto">
                                            <button type="submit" class="btn btn-sm btn-round btn-danger" id="btnReviewUser">Submit</button>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="return_to" id="return_to" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" >
                                </form>
                            </div>
                        </div>

                    <?php } else { ?>
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-center">Update your rating</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8 mr-auto ml-auto">
                                    <p id="originalRating" style="display:none;"><?php echo $this->reviewOfUser['rating'];?></p>

                                    <div class="row">
                                        <div class="mr-auto ml-auto">
                                            <i class="fa fa-star" data-index="0"></i>
                                            <i class="fa fa-star" data-index="1"></i>
                                            <i class="fa fa-star" data-index="2"></i>
                                            <i class="fa fa-star" data-index="3"></i>
                                            <i class="fa fa-star" data-index="4"></i>
                                        </div>
                                    </div>
                                    
                                    <p class="text-center"><?php echo $this->reviewOfUser['comment'];?></p>

                            </div>
                        </div>
                    <?php } ?>

                <?php } ?>
                    
            

            </div>

        </div>


    </div>
</div>