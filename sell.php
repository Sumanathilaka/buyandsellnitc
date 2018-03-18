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

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script type="text/javascript">

    $(document).ready(function(){

        $('input[type="radio"]').click(function(){

            var inputValue = $(this).attr("value");

            var targetBox = $("." + inputValue);

            $(".box").not(targetBox).hide();

            $(targetBox).show();

        });

    });

    </script>
</head>


<body onload = "startTimer()">

<div class="navbar" id="menu">

  <a href="#" style="float: left"><strong>BUY AND SELL NITC</strong></a>
  <div class="dropdown">
  <a href="index1.php" style="background-color: #45a049;">Signout</a>
  <a href="confirmsale.php">Account</a>
  <a href="about.php">About</a>
  <a href="sell.php"  style="color:orange">Sell</a>
  <a href="opensale.php">Open Sale</a>
  <a href="upcoming.php">Upcoming Items</a>
  <a href="auction.php">Auction Sale</a>
  <a href="homepage.php" >Home</a>
 </div>
</div>
<br><br>
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
<h2 style="color: red">ADD ITEM</h2>
<h3>Add your items to our site. Your sale is our responsiblity(Just Kiddin!).</h3>
<br><br>
</center>
 <div class="container">

  <form action="selltodata.php" method="POST" enctype="multipart/form-data">

    <center>
     <label><input type="radio" name="colorRadio" value="1" checked="true"><strong>Auction Sale</strong></label>
    <label><input type="radio" name="colorRadio" value="2"><strong>Open Sale</strong></label>
    </center>
    <br><br>

    <label >ITEM NAME</label>
    <input type="text"  name="name1" placeholder="Item Name">
        <label >BRAND</label>
    <input type="text"  name="brand" placeholder="Brand">
        <label >QUANTITY</label>
    <input type="text"  name="quantity" placeholder="Quantity">
        <label >PRICE</label>
    <input type="text"  name="price" placeholder="Price">
        <label >SPECIFICATIONS</label>
    <textarea  name="subject" placeholder="Write something.." style="height:100px"></textarea>
    <label>IMAGE</label>
    <input type ="file" name="photo" id="photo">

  <br><br><br>
<div class="1 box">

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
</div>
</div>

    <input type="submit" value="Submit">
</form>

</div> 


</body>
</html>
