<?php

$dsn = 'mysql:host=localhost;dbname=hikeshare';
$username = 'root';
$password =  'scrkre37';
$id = isset($_GET['id'])? $_GET['id'] : "";
$dbo = new PDO($dsn,$username,$password);
$stat = $dbo->prepare("SELECT * FROM user where userid=:id");
$stat->bindValue(':id', $id);
$stat->execute();
$row = $stat->fetch();
$stat->closeCursor();

display_image($row['picture']);

function display_image($file)
{
    header('Content-type: image/jpeg');
        echo ($file);
}
?>