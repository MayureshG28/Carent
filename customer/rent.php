<?php 

    session_start();

    if($_SESSION['role'] != 'customer'){
        header('location: /index.html');
    }

    include '../conn.php';

    $id = $_GET['id'];
    $st_date = date("Y-m-d");
    $days = $_POST['nodays'];

    $username = $_SESSION['username'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];



    $sql= "UPDATE `car_details` SET `Days`='$days', `st_date`='$st_date', `username`='$username', `F_name`='$fname', `L_name`='$lname' WHERE `id`=$id";

    $query = mysqli_query($con, $sql);

    if($query){
        header("Location: available.php");
    }
    else{
        echo "Something went wrong";
    }
?>