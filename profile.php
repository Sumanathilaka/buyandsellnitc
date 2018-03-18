<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>index page</title>
  
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="icon" href="images/nitc.png">

<style>

body{
background-image: url("images/desk.jpg");
background-size :cover; 
   
}

img:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}


.conta input[type=text],.conta input[type=password] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  font-size:16px;
}

/* Set a style for all buttons */
.header button,.modal button {
    background-color: rgba(0,5,255,0.5);
    color: white;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 10%;
     font-size:10px;
}


/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 150px;
  height:150px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
  display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
  padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

</style>
</head>

<body>


<?php
$username=$_SESSION['username'];
?>




<div id="modal-wrapper1" class="modal">
  
  <form class="modal-content animate" action="usersign.php" method="POST">
        
    <div class="imgcontainer">

      <span onclick="document.getElementById('modal-wrapper1').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="images/avatar2.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Create Profile</h1>
    </div>

    <div class="conta">
   
<input type="text" name="name" placeholder="Name" required><br>
<input type="text" name="rollno" placeholder="Rollno" required>
<br>
<input type="text" name="department" placeholder="Department" required>
<br>
<input type="hidden" name="email" placeholder="NITC Email" value="<?php echo $username;?>">
<br>
<input type="text" name="mobileno" placeholder="Mobileno" required>
<br>
<input type="text" name="address" placeholder="Address" required>
<br>


<center>  <button type="submit" style="width:120px;height: 60px ;padding: 10px;font-size: 16px">Create</button></center>
<br>
</div>
   </form>
  </div>






<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper1');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<div style="height: 100px" >
 
 <div style="float: left;">
      <img src="images/nitc.png" height="100px" width="100px" style="padding: 5px;background-color: white;">
      
 </div>

 <div style="float: right">
 
      <img onclick="document.getElementById('modal-wrapper1').style.display='block'" src="images/add.png" height="80px" width="80px"  onmouseover="bigImg(this)" onmouseout="normalImg(this)" border="0">
 </div>


<script>
function bigImg(x) {
    x.style.height = "100px";
    x.style.width = "100px";
}

function normalImg(x) {
    x.style.height = "80px";
    x.style.width = "80px";
}
</script>

</div>

<center>
<h1 style="color:white ;font-style: italic; font-size: 80px;padding: 5px;line-height: 15px">BUY 'N SELL</h1>

<h1 style="color:white ;font-style: italic;font-size: 70px;line-height: 50px">NITC</h1>
<center>

<img src="images/3434.png" height="200px" width="300px" style="padding: 10px">
<img src="images/3435.jpg" height="200px" width="300px" style="padding: 10px">
<img src="images/3436.jpg" height="200px" width="300px" style="padding: 10px">

<h3 style="color:white ;font-style: italic;" >
" To give a real Service ,You must add something which cannot be bought or <br> 
measured with money, and that is sincerity and intergrity "
</h3>
<br>

<br>
<br>
<center>
    <img  src="images/Facebook.png"  height="40px" width="40px"  style=" border-radius: 50%; padding: 5px" >
      <img src="images/youtube.png" height="40px" width="40px"  style=" border-radius: 50%;padding: 5px" >
        <img src="images/twitter.png" height="40px" width="40px"  style=" border-radius: 50%;padding: 5px" >
          <img  src="images/instagram.png" height="40px" width="40px"  style=" border-radius: 50%;padding: 5px" >
            <img src="images/g-plus.png" height="40px" width="40px"  style=" border-radius: 50%;padding: 5px" >
  

</center>


</body>
