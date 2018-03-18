<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>itemview</title>
  
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

input[type=text], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

input[type=date], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

input[type=time], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}


input[type=file], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

</style>

</head>
<body>
<div class="navbar" id="menu">

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
<br><br>
<h1>ITEM DETAILS</h1>
<br><br>

<?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$option=mysqli_real_escape_string($conn, $_POST['itemid']);
$price=mysqli_real_escape_string($conn, $_POST['price']);
$user="null";


$sql = "SELECT sellerid,name,brand,quantity,specify,approval,imageid,addeddate,itemid
FROM item
where itemid=$option";
$result= mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
               
                      $user=$row['sellerid'];

                  echo "<img src= 'uploads/".$row['imageid']."'"." width='300' height='300'/>";
                  echo  "<h4>Item id:  " . $row["itemid"]."<br> ". " Item Name :  " . $row["name"]. " <br> ". " Brand : " . $row["brand"]. "<br> "." Quantity: " . $row["quantity"]."<br>  ".  "Specification: " . $row["specify"]."<br>  ". "Price: " . $price ."<br><br>" ; 
                


                }}


                 echo "<h3>Seller Details</h3>";

                  $sql1 = "SELECT name,address,mobileno,email,department,rollno
                       FROM login";
                    

                      $result1= mysqli_query($conn, $sql1);

                      if (mysqli_num_rows($result1) > 0) {
                        while($row = mysqli_fetch_assoc($result1)) {
                           if($row['email']==$user){

             echo  "<h4>Seller name:  " . $row["name"]."<br> ". " Address :  " . $row["address"]. " <br> ". " Mobile No : " . $row["mobileno"]. "<br> "." Email: " . $row["email"]."<br><br>" ; 

               }}}

mysqli_close($conn);
?> 

<a href="homepage.php">GO TO HOME</a>
</center>
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

