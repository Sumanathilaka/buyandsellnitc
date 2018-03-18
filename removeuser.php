<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
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

<div class="navbar" id="menu">

  <a href="#" style="float: left"><strong>BUY AND SELL NITC</strong></a>
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
</div>
</div>
<br><br>

<center>
<?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$email=$_SESSION['username'];

$sql = "SELECT name,email,rollno FROM login ";
$result= mysqli_query($conn, $sql);
$no="no";
$roll="null";
$type=0;
$availability=0;



if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
                           $roll=$row['email'];
                echo  "<h4>User ID id:  " . $row["email"]."<br> ". "Name :  " . $row["name"]. " <br> ". "Roll Number : " . $row["rollno"]."<br> </h4> " ; 

?>

 <form action="remuser.php" method="post">
  <input type="hidden" name="email" value=<?php echo $roll ?> >
  <input type="submit" value="Remove">
</form>

<?php
echo "<hr>";

    }



}
                  
mysqli_close($conn);
?> 
</center>

</body>
</html>