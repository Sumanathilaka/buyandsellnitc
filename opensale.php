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
  <a href="index1.php" style="background-color:  #45a049;">Signout</a>
    <a href="confirmsale.php">Account</a>
  <a href="about.php">About</a>
  <a href="sell.php">Sell</a>
  <a href="opensale.php" style="color:orange">Open Sale</a>
  <a href="upcoming.php">Upcoming Items</a>
  <a href="auction.php">Auction Sale</a>
  <a href="homepage.php" >Home</a>

  
 </div>
</div>
<br><br>
<center>
<img id="img" src="images/as7.jpg" width="100%" height="250px">

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

  <?php

$conn = new mysqli("localhost", "root", "Hello@123", "se");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$todaydate = date('Y-m-d');

$sql = "SELECT sellerid,name,brand,quantity,specify,approval,imageid,addeddate,item.itemid,price
FROM item,opensale 
where item.itemid=opensale.itemid";
$result= mysqli_query($conn, $sql);
$roll="null";
$availability=0;
$yes="accept";
$price1=0;


if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
               if($row[approval]==$yes){
                   

                  $availability=1;
                  $roll=$row['itemid'];
                  $price1=$row['price'];
          ?>
          <div style="width: 33%;float:right" >
            <center>
            <?php
                 echo "<img src= 'uploads/".$row['imageid']."'"." width='200' height='200'/>";
                echo  "<h4>Item id:  " . $row["itemid"]."<br> ". " Item Name :  " . $row["name"]. " <br> ". " Brand : " . $row["brand"]. "<br> "." Quantity: " . $row["quantity"]."<br>  "." Price: " . $row["price"]."<br>  ".  "Specification: " . $row["specify"]."<br>  ". "Added date : " . $row["addeddate"]."<br> </h4> " ; 





?>

 <form action="fullitemview.php" method="post" >
  <input type="hidden" name="itemid" value=<?php echo $roll ?> >
  <input type="hidden" name="price" value=<?php echo $price1 ?> >
  <input type="submit" value="More Details">
</form>
</center>
</div>

<br><br><br>
<?php

}
}
}


if($availability==0)
{
  echo "No items!";
}

                  
                  
mysqli_close($conn);
?> 
 <br><br><br><br>

    
</body>
</html>
