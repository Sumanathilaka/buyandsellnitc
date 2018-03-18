<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> approval </title>
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

$id=0;

$email=mysqli_real_escape_string($conn, $_POST['email']);

echo $email;

$sql1 = "DELETE FROM login WHERE email='$email'";

if ($conn->query($sql1) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record from user: " . $conn->error;
}

$sql = "DELETE FROM password WHERE email='$email'";
if ($conn->query($sql) === TRUE) {
    echo "User Removed!";
} else {
    echo "Error updating record from password: " . $conn->error;
}

$sql2 = "SELECT sellerid,item.itemid,auctionsale.itemid
FROM item,auctionsale 
where item.itemid=auctionsale.itemid and sellerid='$email'";
$result2= mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)){
    $id=$row['itemid'];

$sql4 = "DELETE FROM auctionsale WHERE itemid='$id'";
$result4 = mysqli_query($conn, $sql4);

}}

$sql6 = "SELECT sellerid,item.itemid,opensale.itemid
FROM item,opensale
where item.itemid=opensale.itemid and sellerid='$email'";
$result6= mysqli_query($conn, $sql6);

if (mysqli_num_rows($result6) > 0) {
    while($row = mysqli_fetch_assoc($result6)){
    $id=$row['itemid'];

$sql7 = "DELETE FROM opensale WHERE itemid='$id'";
$result7 = mysqli_query($conn, $sql7);

}}

$sql = "DELETE FROM bidrecord WHERE bidderid='$email'";
if ($conn->query($sql) === TRUE) {
    echo "Bid record Removed!";
} else {
    echo "Error updating record from password: " . $conn->error;
}

$sql71 = "DELETE FROM item WHERE sellerid='$email'";
$result71 = mysqli_query($conn, $sql71);



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