<!--main / general header--> 
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
        
        <?php
            if(isset($this->title)){
                echo $this->title;
            } else {
                echo "hikehare - RideSharing Community";
            }
        ?>

        </title>

        <!--link the bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--link the font awesome -->
        <script src="https://kit.fontawesome.com/6b92042dff.js"></script>
        <!--link to the css-->
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/register.css">
        <script src="<?php echo URL; ?>public/js/genScript.js"></script>
    </head>
    <body>
    <div class="container-fluid">