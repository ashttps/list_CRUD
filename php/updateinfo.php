<?php
include("connection.php");
include("change.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change your User information</title>
    <link rel="stylesheet" href="/css/stylesheets/form_style.css">
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

    <div class="container-change">
        <form action="" method="POST" class="change">
            Change your Username: <input type="text" name="newuser" placeholder="At least 5 characters">
            Change your password: <input type="password" name="newpass" placeholder="At least 4 characters and 1 numeric">
            <div class="buttons">
                <button><a href="change.php"> Make Changes </a></button>
                <button type="reset" value="Reset" >Clear</button> 
            </div>
       
    </form>
        
    </div>

</body>
</html>