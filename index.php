<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
  
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


  <meta name="google-signin-client_id" content="195480373562-qdrjh401jsp6kl9pp4aiuot9a2im22s5.apps.googleusercontent.com">  
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style type="text/css">
    .data{
      display: none;
      overflow: scroll;
    } 
    .g-signin2{
      margin-top: 10px;
    
    }
  </style>

</head>

<body>


<div id="modal-wrapper" class="modal">
  <div class="modal-content animate">
  <form action="gsignin.php" id="signinform" method="post">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="images/1.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Welcome To Nitc Buying n Selling Platform</h1>
    </div>

        <input name="emailval" id="emailval"  style="display:none" required/>
        <input name="nameval" id="nameval" style="display:none" required/>
    
  <center><div class="g-signin2" data-onsuccess="onSignIn"></div></center>
</form>
  <div class="data">
    <p>Profile Details</p>
    <img id="pic" class="img-circle" width="100" height="100"/>
    <p id="name" class ="alert alert-danger"></p>
    <p id="email" class="alert alert-danger"></p>
    <button onclick="signIN()" class="btn btn-danger">Continue</button>
    <button onclick="signOut()" class="btn btn-danger">SignOut</button>
  </div>
    <br><br><br>
  </div>
  
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
      <img src="images/nitc.png" height="100px" width="100px" style="padding: 5px;background-color: white">
 </div>

 <div style="float: right">
 <img onclick="document.getElementById('modal-wrapper').style.display='block'" src="images/login.png" height="80px" width="80px"  onmouseover="bigImg(this)" onmouseout="normalImg(this)" border="0" >
      
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
<br>
<h1 style="color:white ;font-style: italic;font-size: 70px;line-height: 50px">NITC</h1>
<center>

<img src="images/3434.png" height="200px" width="300px" style="padding: 10px">
<img src="images/3435.jpg" height="200px" width="300px" style="padding: 10px">
<img src="images/3436.jpg" height="200px" width="300px" style="padding: 10px">

<h3 style="color:white ;font-style: italic;">
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
