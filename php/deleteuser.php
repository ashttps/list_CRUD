<?php
session_start();

include("connection.php");
include("functions.php");
include("edituser.php");

if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];

    $query = "DELETE FROM logindb WHERE userid = '$id' ";
    $result = mysqli_query($con, $query);

    if($result){
        header("Location: register.php");
    }else{ 
        echo "not successful";
        die(mysqli_error($con));
    } 
}