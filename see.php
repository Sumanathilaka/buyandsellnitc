<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> approval </title>
  
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="css/second.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts1.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="navbar" id="menu">

  <a href="#" style="float: left"><strong>BUY AND SELL NITC</strong></a>
  <div class="dropdown">
     <a href="index1.php" style="background-color: #45a049;">Signout</a>
     <a href="about.php">About</a>
     <a href="adduser.php">Add User</a>
     <a href="removeuser.php" >Remove User</a>
     <a href="approvalitem.php" >Approve Items</a>
   <a href="appmodbid.php" > Approve Modifications</a>
  
  
  <a href="homepageadmin.php" style="color:orange">Home</a>
</div>
</div>
<?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$option=mysqli_real_escape_string($conn, $_POST['itemid']);
$dura=mysqli_real_escape_string($conn, $_POST['duration']);
$old=0;

$sql = "UPDATE modifytime SET approval='accept' WHERE itemid=$option";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql1 = "SELECT itemid,duration FROM auctionsale where itemid=$option";
$result= mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       $old=$row['duration'];
               }
           }

$old=$old+$dura;

$sql3 = "UPDATE auctionsale SET duration=$old WHERE itemid=$option";

if ($conn->query($sql3) === TRUE) {
    echo "Record updated!";
} else {
    echo "Error updating record: " . $conn->error;
}


?>
<footer style="    clear: both;
    position: relative;
    z-index: 10;
    height: 3em;
    margin-top: -3em;background-color: #333;">
  <center>
    <?php
     echo $_SESSION['username'];
     ?>
  </center>
</footer>
</body>
</html>