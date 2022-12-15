<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $username = $_POST['user'];
        $password = $_POST['psw'];
    

        if(!empty($username) && !empty($password) && !is_numeric($username)) 
        {
                //save in db
                $userid = random_num(20);
                $query = "insert into logindb(userid, username, password) values('$userid', '$username', '$password')";

                mysqli_query($con, $query);
                    header("Location: login.php");
                    die;
        } else{
            echo '<script>alert("Please enter a valid username and password!")</script>';
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/stylesheets/form_style.css">
    <title>Register as New User</title>
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

    <div class="container">
        <form action="" method="post">
           <label> First Name:<input type="text" placeholder="First Name"> </label>
           <label for="">Last Name:<input type="text" placeholder="Last Name"></label>  
           <label for="">Username:<input type="text" placeholder="Username" name="user"></label>  
           <label for="">Password:<input type="password" placeholder="Password" name="psw"></label>  

            <button type="submit" value="Submit"> REGISTER </button> 
            <button type="reset" value="Reset"> CLEAR </button>
        </form>

        <div class="loginquery">
            Already a member? <a href="login.php">Log in here!</a>
        </div>
    </div>

    
    <script src="script.js"></script>
</body>
</html>