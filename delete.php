<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>delete  non approved</title>
  
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
$email= $_SESSION['username'];

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$option=mysqli_real_escape_string($conn, $_POST['itemid']);

$sql1 = "SELECT sellerid,itemid,name FROM item WHERE itemid=$option";

$result= mysqli_query($conn, $sql1);
$roll1="null";
$roll2="null";
$roll3="null";

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
               
                  $roll1=$row['itemid'];
                  $roll2=$row['sellerid'];
                  $roll3=$row['name'];

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

$mail->setFrom('buynsellnitc@gmail.com', 'admin');
$mail->addAddress($roll2);
$mail->Subject = 'Rejection Of item from buynsellnitc';
$mail->Body = 'your item'.$roll3.'has been rejected by the admin.Thank you!    ~buynsellnitc';

if ($mail->send())
    echo " ";
else
	echo "error";

    echo "Item Deleted!";
} 
}

$sql = "DELETE FROM item WHERE itemid=$option";
$sql2= " DELETE FROM auctionsale WHERE itemid=$option";
$sql3= " DELETE FROM opensale WHERE itemid=$option";

$result1= mysqli_query($conn, $sql);
$result2= mysqli_query($conn, $sql2);
$result3= mysqli_query($conn, $sql3);


mysqli_close($conn);
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
