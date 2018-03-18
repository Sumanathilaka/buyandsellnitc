<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/nitc.png">
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

</head>


<body onload = "startTimer()">

<div class="navbar" id="menu">

  <a href="#" style="float: left"><strong>BUY AND SELL NITC</strong></a>
  <div class="dropdown">
     <a href="index1.php" style="background-color: #45a049;">Signout</a>
     <a href="about.php">About</a>
     <a href="adminadduser.php">Add User</a>
     <a href="removeuser.php" >Remove User</a>
     <a href="approvalitem.php" >Approve Items</a>
   <a href="appmodbid.php" > Approve Modifications</a>
  
  
  <a href="homepageadmin.php" style="color:orange">Home</a>
</div>
</div>
<br>
<center>
<img id="img" src="images/as5.jpg" width="100%" height="250px">

  <script>
          function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }
          
            function startTimer() {
              setInterval(displayNextImage, 3000);  
          }

          var images = [], x = -1;
          images[0] = "images/as.jpg";
          images[1] = "images/as6.png";
          images[2] = "images/as5.jpg";
          images[3] = "images/as7.jpg";
          images[4] = "images/as8.jpg";
          images[5] = "images/as1.jpg";

      </script>
  </center>
<center>
<?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT sellerid,name,brand,quantity,specify,approval,imageid,addeddate,itemid FROM item";
$result= mysqli_query($conn, $sql);
$no="no";
$roll="null";
$type=0;
$availability=0;

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
               if($row[approval]==$no){

                  $availability=1;
                  $roll=$row['itemid'];

                  ?>
          <div style="width: 33%;float:right" >
            <center>
            <?php
                   echo "<img src= 'uploads/".$row['imageid']."'"." width='200' height='200'/>";
                echo  "<h4>Item id:  " . $row["itemid"]."<br> ". " Item Name :  " . $row["name"]. " <br> ". " Brand : " . $row["brand"]. "<br> "." Quantity: " . $row["quantity"]."<br>  ".  "Specification: " . $row["specify"]."<br>  ". "Added date : " . $row["addeddate"]."<br> </h4> " ; 


$sql2 = "SELECT itemid,price FROM opensale";
$result2= mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    
    while($row = mysqli_fetch_assoc($result2)) {
                   if($row['itemid']==$roll){
          $type=1;
          echo  "<h4>Price:  " . $row["price"]."<br>"."</h4>";
}}}

$sql3 = "SELECT itemid,initialprice,starttime,startdate,duration FROM auctionsale";
$result3= mysqli_query($conn, $sql3);

if (mysqli_num_rows($result3) > 0) {
	 
   while($row = mysqli_fetch_assoc($result3)){
    	  if($row['itemid']==$roll){
          $type=2;
          echo  "<h4>Initialprice :  " . $row["initialprice"]."<br> ". " Start time :  " . $row["starttime"]. " <br> ". "Start date : " . $row["startdate"]. "<br> "." Duration: " . $row["duration"]."<br>"."</h4>"; 

}}
}
?>

 <form action="accept.php" method="post">
  <input type="hidden" name="itemid" value=<?php echo $roll ?> >
  <input type="submit" value="approve">
</form>

<?php
if($type==2)
{ 
?>

<form action="acceptedit.php" method="post">
<input type="hidden" name="itemid" value=<?php echo $roll ?>>
<input type="hidden" name="type" value=<?php echo $type ?>>
<input type="submit" value="Edit and approve">
</form>

<?php
}
?>

 <form action="delete.php" method="post">
  <input type="hidden" name="itemid" value=<?php echo $roll ?>>
  <input type="submit" value="Delete">
</form>

</div>


<?php
echo "<hr>";

    }



}}

if($availability==0)
{
  echo "No Item To Review!";
}                  
mysqli_close($conn);
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