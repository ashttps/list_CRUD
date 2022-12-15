<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">  
    <title>Your Shopping List</title>
    <link rel="stylesheet" href="/css/stylesheets/style.css">
    <link rel="stylesheet" href="/css/stylesheets/form_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

  <body>
    <div class="navbar">
        <img src="/css/assets/shopping-bag.png" alt="">
        <ul>
            <li> <a href="/php/main.php">Home</a></li>
            <li><a href="/php/edituser.php">Profile</a></li>
            <li><a href="/php/register.php">Register</a></li>
            <li><a href="login.php">Log In</a></li>
        </ul>
        <img src="/css/assets/shopping-bag.png" alt="">
    </div>

    <div class="hello">
      <h1>Welcome, <?php echo $user_data['username'];?>!</h1>
      <p> Here is your shopping list</p>
    </div>

    <div class="wrapper">
      <div class="product-input">
        <img src="/css/assets/bars-icon.svg" alt="icon">
        <input type="text" placeholder="Add a new product">
      </div>
      <div class="ctrls">

        <div class="filters">
          <span class="active" id="all">All</span>
          <span id="pending">Pending</span>
          <span id="bought">Bought</span>
        </div>

        <button class="clear-btn" onclick="document.getElementById('popup').style.display='block'">Delete All</button>
      </div>

      <ul class="product-box"> </ul>

      <form action="logout.php">
          <button class="logout" id="logout" value="logout">Log Out</button>
      </form>
  
  </div>

  <div id="popup" class="modal">
  <span onclick="document.getElementById('popup').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="deleteuser.php">
    <div class="container">
      <h1>Delete Products</h1>
      <p>Are you sure you want to delete your products?</p>
      <div class="clearfix">
        <button type="button" class="deletebtn"><a href="main.php">Delete</a></button>
        <button type="button" class="cancelbtn"><a href="main.php">Cancel</a></button>
      </div>
    </div>
  </form>
</div>

    <script src="script.js"></script>
  </body>
  </html>