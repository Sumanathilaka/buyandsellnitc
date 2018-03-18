<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="nitc.png">
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
     <a href="adduser.php">Add User</a>
     <a href="removeuser.php" >Remove User</a>
     <a href="approvalitem.php" >Approve Items</a>
   <a href="appmodbid.php" > Approve Modifications</a>
  
  
  <a href="homepageadmin.php" style="color:orange">Home</a>
</div>
</div>

<center>
<?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$currenttime=date('m-d-Y H:i:s');
$sql = "SELECT sellerid,name,brand,quantity,specify,approval,imageid,addeddate,item.itemid,bidwinner,currentprice,startdate,starttime,duration
FROM item,auctionsale 
where item.itemid=auctionsale.itemid";
$result= mysqli_query($conn, $sql);
$option="null";
$yes="accept";
$d="null";
$t="null";
$d="null";


if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
              
$d=$row['startdate'];
$t=$row['starttime'];
$v=$row['duration'];
$newnew = date('m-d-Y H:i:s', strtotime("$d $t"));   
$new = date('m-d-Y H:i:s', strtotime("$d $t + $v hours"));       

            

           if($row['approval']==$yes){
           if($currenttime > $newnew){
            if($currenttime > $new){
             $option=$row['itemid'];
$sellerid=$row['sellerid'];
$buyer=$row['bidwinner'];
$itemname=$row['name'];
$amount=$row['currentprice'];

require 'PHPmail/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPDebug  = 2;
$mail->Username = 'buynsellnitc@gmail.com';
$mail->Password = 'buynsell123';

$mail->setFrom('buynsellnitc@gmail.com', 'Admin');
$mail->addAddress($sellerid);
$mail->addAddress($buyer);
$mail->Subject = 'BID details';
$mail->Body = 'The '.$itemname.' sold by '.$sellerid.' has been won by '.$buyer.' ~buynsellnitc';

if ($mail->send())
    echo "Mail sent";
else
  echo "error";


$sql = "DELETE FROM item WHERE itemid=$option";
$sql2= "DELETE FROM auctionsale WHERE itemid=$option";
$sql3= "DELETE FROM bidrecord WHERE itemid=$option";

$result1= mysqli_query($conn, $sql);
$result2= mysqli_query($conn, $sql2);
$result3= mysqli_query($conn, $sql3);
    
echo "Item Deleted!";
}
}
}}}

                 
mysqli_close($conn);
?> 
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
