<?php
session_start();
?>



<!DOCTYPE html>
<html>
<head>

<style>

.conta input[type=text],.conta input[type=password], .conta input[type=email] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  font-size:16px;
}

/* Set a style for all buttons */
.header button,.modal button {
    background-color: rgba(0,5,255,0.5);
    color: white;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 10%;
     font-size:10px;
}


/* Center the image and position the close button */


/* The Modal (background) */
.modal {
  display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
  padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}



input[type=text], select, textarea{
    width: 40%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}


</style>
<script src="http://code.jquery.com/jquery-latest.js"></script>


<script type="text/javascript">
(function($) {          
    $(document).ready(function(){                    
        $(window).scroll(function(){                          
            if ($(this).scrollTop() > 100) {
                $('#menu').fadeIn(100);
            }
        });
    });
})(jQuery);

</script>

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
	<title> approval </title>
  
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />

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
<br><br><br>
  <center>
<?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$option=mysqli_real_escape_string($conn, $_POST['itemid']);
$type=mysqli_real_escape_string($conn, $_POST['type']);

if ($type==2){
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

<form action="modifyauction.php" method="POST">

  <input type="hidden" name="itemid" value=<?php echo $option ?>>
  <br>
 <label >PRICE</label>
   <input type="int"  name="price" placeholder="Price "><br>
  <label >START DATE</label>
   <input type="date"  name="stdate" placeholder="Auction Start date ">
   <br>
   <label >START TIME</label>
   <input type="time"  name="sttime" placeholder="Auction Start Time">
<br>
  <label for="duration">DURATION</label>
  <select  name="duration">
<option value="">Select The Duration</option>    
<option value="24">1 day</option>
<option value="48">2 days</option>
<option value="72">3 days</option>
<option value="69">4 days</option>
<option value="120">5 days</option>
<option value="144">6 days</option>
<option value="168">7 days</option>
<option value="336">2 weeks</option>
<option value="504">3 weeks</option>
<option value="720">1 month</option>
<option value="1440">2 months</option>
</select>
<br><br>
 <input type="submit" value="Edit and Accept">
</form>


<?php
}
?>
<br>
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
