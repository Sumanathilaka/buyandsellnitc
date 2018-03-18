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


<?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sellerid = $_SESSION['username'];
$currenthighprice=0;
$d="null";
$t="null";
$d="null";
$combinedDT=0;
$currenttime=date('m-d-Y H:i:s');

$option=mysqli_real_escape_string($conn, $_POST['itemid']);

$sql = "SELECT sellerid,name,brand,quantity,specify,approval,imageid,addeddate,item.itemid,startdate,starttime,duration,initialprice,currentprice
FROM item,auctionsale 
where item.itemid=auctionsale.itemid";

$result= mysqli_query($conn, $sql);
$expire=0;
$bidwinner=1;


if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
                if($row[itemid]==$option){

$d=$row['startdate'];
$t=$row['starttime'];
$v=$row['duration'];


$combinedDT = date('m,d,Y H:i:s', strtotime("$d $t + $v hours"));
$newnew = date('m-d-Y H:i:s', strtotime("$d $t + $v hours"));


if($currenttime > $newnew){
  $expire=1;
}


                	$currenthighprice=$row['currentprice'];
              echo "<img src= 'uploads/".$row['imageid']."'"." width='200' height='200'/>";
                  echo  "<h4>Item id:  " . $row["itemid"]."<br> ". " Item Name :  " . $row["name"]. " <br> ". " Brand : " . $row["brand"]. "<br> "." Quantity: " . $row["quantity"]."<br>  ".  "Specification: " . $row["specify"]."<br>  ". "Added date : " . $row["addeddate"]."<br>" ; 
                  echo "<h3> ONGOING BID  DETAILS</h3>";
                    echo "<h4>Initial Price:  " . $row["initialprice"]."<br> ". " Current price :  " . $row["currentprice"]. " <br>";
  

?>
<p id="demo"></p>

<script>
    var dat= '<?php echo $combinedDT ?>';
// Set the date we're counting down to
var countDownDate = new Date(dat).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
}, 1000);
</script>


<?php
if ($expire==0){

?>

 <form action="bidupdate.php" method="post">
  <input type="hidden" name="itemid" value=<?php echo $option ?> >
  <input type="hidden" name="hicupr" value=<?php echo $currenthighprice ?> >
   <input type="text" name="bid" >
  <input type="submit" value="enter your bid">
</form>

<?php
}

else
{

$sql4="SELECT auctionsale.currentprice,auctionsale.itemid,bidrecord.bidamount,bidrecord.bidderid,bidrecord.itemid
FROM auctionsale ,bidrecord
where bidrecord.itemid=auctionsale.itemid and bidrecord.bidamount=auctionsale.currentprice and bidrecord.itemid=$option";

$result4= mysqli_query($conn, $sql4);

if (mysqli_num_rows($result4) > 0) {
    
    while($row = mysqli_fetch_assoc($result4)) {
                 $bidwinner=0;
         echo  "<h4>Bid winner:  " . $row["bidderid"]."<br> ";

              
                }
              }


              if($bidwinner==1){

                echo "<br>"."Item not sold"."<br><br>";
              }

}
}
}
}

               
mysqli_close($conn);
?> 

<form action="bidhistory.php" method="post">
 <input type="hidden" name="itemid" value=<?php echo $option ?> >
<input type="submit" value="View Bid History">
  

</form>

</center>
<br><br>
<footer style="position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;"
  <center>
  
  Logged in as :
    <?php
     echo $_SESSION['username'];
     ?>
  
  </center>
</footer>
</body>
</html>

