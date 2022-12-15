<?
session_start();

 include("connection.php");
 include("functions.php");
 include("deleteuser.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <link rel="stylesheet" href="/css/stylesheets/form_style.css">
    <title>Your Profile</title>
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
        <h1> Welcome to your profile page </h1>
      </div>

    <div class="container-change">
        
        <form action="" class="change">
        <div class="buttons">
            Change your username and/or password: <button type="submit"  > <a href="updateinfo.php"> Update User </a> </button> <br>
            Delete your user account: <button type="reset" value="reset"class="reset" onclick="document.getElementById('popup').style.display='block'"> Delete User </button>
        </div>
     </form>

       
    </div>

    <div id="popup" class="modal">
  <span onclick="document.getElementById('popup').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="deleteuser.php">
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your account?</p>
      <div class="clearfix">
        <button type="button" class="deletebtn"><a href="deleteuser.php">Delete</a></button>
        <button type="button" class="cancelbtn"><a href="edituser.php">Cancel</a></button>
      </div>
    </div>
  </form>
</div>


</body>
</html>