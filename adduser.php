<!Doctype html>
<html>
<head>

<style >
    body{

        text-align: center;
        color: black;
         background-image: url("qq.jpg");
    background-size : cover;
    }



</style>


</head>
<body>


<?php

$nitc="nitc.ac.in";
$email=$_POST['email'];
if( strpos($email,$nitc )== false ) {
    echo "Please enter nitc email id!";
    echo "<a href='index.php'>Try Aagin!</a>";
}
else{
$conn = new mysqli("localhost", "root", "Hello@123", "se");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$name=mysqli_real_escape_string($conn, $_POST['name']);
$address=mysqli_real_escape_string($conn, $_POST['address']);
$mobileno=mysqli_real_escape_string($conn, $_POST['mobileno']);
$email=mysqli_real_escape_string($conn, $_POST['email']);
$address=mysqli_real_escape_string($conn, $_POST['address']);
$department=mysqli_real_escape_string($conn, $_POST['department']);
$rollno=mysqli_real_escape_string($conn, $_POST['rollno']);
$password=mysqli_real_escape_string($conn, $_POST['password']);
$role=mysqli_real_escape_string($conn, $_POST['type']);



$sql = " INSERT INTO login(name,address,mobileno,email,department,rollno) VALUES ('$name','$address','$mobileno','$email','$department','$rollno')";

$sql1 = " INSERT INTO password(email,password,role) VALUES ('$email','$password','$role')";

if (mysqli_query($conn, $sql) === TRUE) {
    echo "new account created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sql1) === TRUE) {
    echo "User Added!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
<br><br>
<br>
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
<html>