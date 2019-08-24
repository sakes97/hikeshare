<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>Blob File MySQL</title>
</head>
<body>
<?php 

    /**
     * Point of the script is to upload user images to the database through a test script before 
     * the initial registrations made through the applications
     */
    
    $dsn = 'mysql:host=localhost;dbname=hikeshare';
    $username = 'root';
    $password =  'scrkre37';

    $dbo = new PDO($dsn,$username,$password);

    if(isset($_POST["btn"])){
        $name = $_FILES['myfile']['name'];
        $type = $_FILES['myfile']['type'];
        $data = file_get_contents($_FILES['myfile']['tmp_name']);
        $stmt = $dbo->prepare("UPDATE user
                              SET picture = :picture
                              WHERE userid='5DFcJzbMjbi'");
        // $stmt->bindParam(1,$name);
        // $stmt->bindParam(2,$type);
        // $stmt->bindParam(3,$data);
        $stmt->bindValue(':picture',$data);
        $stmt->execute();
        $stmt->closeCursor();
    }


?>


<form method="post" enctype="multipart/form-data">
    Select Image:
    <input type="file" name="myfile" id="myfile"/>
    <input type="submit" value="Upload PDF" name="btn">
</form>

<p></p>
<ol>
<?php

$stat = $dbo->prepare("SELECT userid, firstname, picture FROM user");
$stat->execute();

while($row = $stat->fetch()){
    echo "<li><a target='_blank' href='view.php?id=".$row['userid']."'>".$row['userid']."</a></li>";
}
?>
</ol>
</body>
</html>