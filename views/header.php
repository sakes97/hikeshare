<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

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
        <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet" />

        
        <!--link the font awesome -->
        <!-- <script src="https://kit.fontawesome.com/6b92042dff.js"></script> -->
        
        <!--link to the css-->
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css">
        <link href="<?php echo URL; ?>public/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
        <!-- <link rel="stylesheet" href="<?php //echo URL; ?>public/css/register.css"> -->
        
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
    <div>