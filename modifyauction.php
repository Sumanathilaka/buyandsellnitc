<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>modifyauction and approve </title>
	
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
$price=mysqli_real_escape_string($conn, $_POST['price']);
$stdate=mysqli_real_escape_string($conn, $_POST['stdate']);
$sttime=mysqli_real_escape_string($conn, $_POST['sttime']);
$duration=mysqli_real_escape_string($conn, $_POST['duration']);
$bidwinner="NULL";


$sql3 = "UPDATE item SET approval='accept' WHERE itemid=$option";

if ($conn->query($sql3) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}



$sql = "DELETE FROM auctionsale WHERE itemid=$option";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$sql2 = " INSERT INTO auctionsale(itemid,initialprice,starttime,startdate,duration,bidwinner,currentprice) VALUES ('$option','$price','$sttime','$stdate','$duration','$bidwinner','$price')";



if (mysqli_query($conn, $sql2) === TRUE) {
    echo "Details Modified!";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
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