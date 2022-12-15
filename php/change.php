<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $newuser = $_POST['newuser'];
    $newpass = $_POST['newpass'];

    if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    
    $query = "UPDATE logindb SET username = '$newuser', password = '$newpass' WHERE userid = '$id' "; 
    $result = mysqli_query($con, $query);

    if($result){
        echo "Alert: Your user information has been updated successfully!";
        header("Location: main.php");
    }else{
        echo "Alert: Flop!";
        die(mysqli_error($con));
    }
    }


}
?>