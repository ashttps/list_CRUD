<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $username = $_POST['user'];
    $password = $_POST['psw'];


    if(!empty($username) && !empty($password) && !is_numeric($username)) 
    {
            //read from db
        
            $query = "select * from logindb where username='$username' limit 1";

            $result = mysqli_query($con, $query);
                if($result){
                    if($result && mysqli_num_rows($result) > 0){
                            $user_data = mysqli_fetch_assoc($result);
                            
                            if($user_data['password'] === $password){
                                $_SESSION['user_id'] = $user_data['userid'];
                                header("Location: main.php");
                                die;
                            }
                    }
                }
                echo '<script>alert("Wrong username or password!")</script>';
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
    <title>Log In</title>
</head>
<body>
    <div class="navbar">
        <img src="/css/assets/shopping-bag.png" alt="">
        <ul>
        <li> <a href="/php/main.php">Home</a></li>
            <li><a href="">Profile</a></li>
            <li><a href="/php/register.php">Register</a></li>
            <li><a href="login.php">Log In</a></li>
        </ul>
        <img src="/css/assets/shopping-bag.png" alt="">
    </div>

    <div class="container">
        <form action="" method="post">
          
           <label for="">Username:<input type="text" placeholder="Username" name="user"></label>  
           <label for="">Password:<input type="password" placeholder="Password" name="psw"></label>  

            <button type="submit" value="Submit"> LOG IN </button> 
            <button type="reset" value="Reset"> CLEAR </button>
        </form>

        <div class="loginquery">
            Not a member? <a href="register.php">Register here!</a>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>