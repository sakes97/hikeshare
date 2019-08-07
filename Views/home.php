<?php
include("common/head.php");
include("common/basic_nav.php");
?>

<!-- Home page Image Header -->
<header class="masthead" style="background-image: url('Views/img/ra3_2x.png');">
    <div class="h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light">Vertically Centered Masthead Content</h1>
                <p class="lead">Starter text</p>
            </div>
        </div>
    </div>

</header>

<!-- Page Content -->
<section class="py-5">
    <div class="container">
        <h2 class="font-weight-light">Page Content</h2>


        <!-- enter destination inputs -->
        <form class="form-group">
            <input type="text" name="from" class="form-control-lg" placeholder="From">
            <input type="text" name="to" class="form-control-lg" placeholder="Destination">
            <button class="btn btn-primary">Find Ride</button>
        </form>


    </div>
</section>
<?php 
include("common/foot.php");
?>