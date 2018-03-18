<?php
session_start();
?>

<!DOCTYPE html>

<html>


<body>

<?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT email,password,role FROM password";
$result= mysqli_query($conn, $sql);

$username=$_POST['emailval'];
$_SESSION['username'] = $username;

 
$pass=mysqli_real_escape_string($conn, $_POST['password']);
$x=0;

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
               if($row[email]==$username){
                        
                        $x=1;
                          
                   Header("location:homepage.php");
                                        
}}}

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