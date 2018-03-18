<?php
session_start();
?>

<!Doctype html>
<html>
<head>
 
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<br><br><br>
<?php


$pname = $_FILES['photo']['name'];
$extension = strtolower(substr($pname,strpos($pname,'.')+1));
$type = $_FILES['photo']['type'];
$size = $_FILES['photo']['size'];
$tmp_name = $_FILES['photo']['tmp_name'];
if(isset($pname))
 {
  if(!empty($pname))
    {
     // if (($extension=='jpg'||$extension=='jpeg)&&$type=='image/jpeg')
         {
          $location='uploads/';
          move_uploaded_file($tmp_name,$location.$pname);
         }
     }
} 


$conn = new mysqli("localhost", "root", "Hello@123", "se");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$target_dir = "/var/www/html/se/uploads/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists


if ($_FILES["photo"]["size"] > 500000) {
    echo ":)";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo ":)";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " :)";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    } else {
        echo ":)";
    }
}


$option=mysqli_real_escape_string($conn, $_POST['colorRadio']);
$name=mysqli_real_escape_string($conn, $_POST['name1']);
$brand=mysqli_real_escape_string($conn, $_POST['brand']);
$quantity=mysqli_real_escape_string($conn, $_POST['quantity']);
$price=mysqli_real_escape_string($conn, $_POST['price']);
$subject=mysqli_real_escape_string($conn, $_POST['subject']);
$image=mysqli_real_escape_string($conn, ($_FILES["photo"]["name"]));
$stdate=mysqli_real_escape_string($conn, $_POST['stdate']);
$sttime=mysqli_real_escape_string($conn, $_POST['sttime']);
$duration=mysqli_real_escape_string($conn, $_POST['duration']);
$approval="no";
$sellerid = $_SESSION['username'];
$todaydate = date('Y-m-d');
$itemid =rand();
$bidwinner="NULL";


$sql = " INSERT INTO item(sellerid,name,brand,quantity,specify,approval,imageid,addeddate,itemid) VALUES ('$sellerid','$name','$brand','$quantity','$subject','$approval','$image','$todaydate','$itemid')";


if($option==2){

$sql1 = " INSERT INTO opensale(itemid,price) VALUES ('$itemid','$price')";
if (mysqli_query($conn, $sql1) === TRUE) {
    echo " ";
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}


}


if($option==1){

$sql2 = " INSERT INTO auctionsale(itemid,initialprice,starttime,startdate,duration,bidwinner,currentprice) VALUES ('$itemid','$price','$sttime','$stdate','$duration','$bidwinner','$price')";

if (mysqli_query($conn, $sql2) === TRUE) {
 echo " ";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

}



if (mysqli_query($conn, $sql) === TRUE) {
    echo " ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo "<script>alert('Item Added!');window.location.href='homepage.php';</script>";
mysqli_close($conn);

?>
<br><br>


</body>
<html>