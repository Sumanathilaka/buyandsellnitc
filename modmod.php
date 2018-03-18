<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title> approval </title>
  
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />

<style>

body{
    background-color: #f2f2f2;
}

#menu {
  position:fixed;
  top:0px;
  width:100%; 
  color: #FFFFFF;
  z-index:9999;

}



.navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial;
}

.navbar a {
    float: right;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    float: right;
    overflow: hidden;
}

.dropdown .dropbtn {
    cursor: pointer;
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font: inherit;
    margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
    background-color: red;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.show {
    display: block;
}
</style>
</head>
<body>
<a href="#" style="float: left"><strong>BUY AND SELL NITC</strong></a>
  <div class="dropdown">
     <a href="index1.php" style="background-color: #45a049;">Signout</a>
     
  <a href="confirmsale.php">Account</a>
  <a href="about.php">About</a>
  <a href="sell.php">Sell</a>
  <a href="opensale.php">Open Sale</a>
   <a href="upcoming.php">Upcoming Items</a>
  <a href="auction.php">Auction Sale</a>
  <a href="homepage.php" style="color:orange">Home</a>
</div>
</div>
  <center>


<?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$option=mysqli_real_escape_string($conn, $_POST['itemid']);



$sql = "SELECT sellerid,name,brand,quantity,specify,approval,imageid,addeddate,itemid FROM item WHERE itemid=$option";
$sql3 = "SELECT itemid,initialprice,starttime,startdate,duration FROM auctionsale item WHERE itemid=$option";


$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
               

               echo "<img src= 'uploads/".$row['imageid']."'"." width='200' height='200'/>";
                echo  "<h4>Item id:  " . $row["itemid"]."<br> ". " Item Name :  " . $row["name"]. " <br> ". " Brand : " . $row["brand"]. "<br> "." Quantity: " . $row["quantity"]."<br>  ".  "Specification: " . $row["specify"]."<br>  ". "Added date : " . $row["addeddate"]."<br> </h4> " ;

                }}

                $result3= mysqli_query($conn, $sql3);

if (mysqli_num_rows($result3) > 0) {
	 
   while($row = mysqli_fetch_assoc($result3)){
    	
  
          echo  "<h4>Initialprice :  " . $row["initialprice"]."<br> ". " Start time :  " . $row["starttime"]. " <br> ". "Start date : " . $row["startdate"]. "<br> "." Duration: " . $row["duration"]."<br>"."</h4>"; 

}}

?>

<form action="modifybidapproval.php" method="POST">

  <input type="hidden" name="itemid" value=<?php echo $option ?>>
  <br>
  <label for="duration">DURATION</label>
  <select  name="duration">
<option value="">Select The Duration</option>    
<option value="5">Add 5 more hours</option>
<option value="10">Add 10 more hours</option>
<option value="15">Add 15 more hours</option>
<option value="24"> Add 1 more day</option>
<option value="48">Add 2 more days </option>
<option value="72">Add 3 more days</option>
<option value="168">Add 7 more days</option>
<option value="336">Add 2 more weeks</option>

<option value="-5">reduce by 5  hours</option>
<option value="-10">reduce by 10 hours</option>
<option value="-15">reduce by 15 hours</option>
<option value="-24">reduce by 1 day</option>
<option value="-48">reduce by 2 days </option>
<option value="-72">reduce by 3 days</option>
<option value="-168">reduce by 7 days</option>
<option value="-336">reduce by 2 weeks</option>
</select>
<br><br>
 <input type="submit" value="Change Duration ">
</form>

<br>
</center>

</body>
</html>
