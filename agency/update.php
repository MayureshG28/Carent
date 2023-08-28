<?php
    session_start();

    if($_SESSION['role'] != 'agent'){
        header('location: ../index.html');
    }

    include '../conn.php';

    $id = $_GET['id'];

    $M_name = $_POST['m_name'];
    $V_number = $_POST['v_number'];
    $Seat = $_POST['seat'];
    $Rent = $_POST['rent'];

    $sql= "UPDATE `car_details` SET `M_name`='$M_name',`V_number`='$V_number',`Seat`='$Seat',`Rent`='$Rent' WHERE `id` = $id";

    $query = mysqli_query($con, $sql);
    
    if($query){
        header("Location: ../agency/booked.php");
    }
    else{
        echo "Something went wrong";
    }
?>