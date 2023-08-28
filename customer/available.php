<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    <title>Available Car</title>
</head>
<body>

    <?php welcome() ?>

    <div class="avail-cars">
        <div class="available-cars" id="main">


            <?php
                include '../conn.php';

                $select = "select * from car_details where Days = '0'";
                $query = mysqli_query($con, $select);
                $total = mysqli_num_rows($query);

                if($total > 0){
                    while($result = mysqli_fetch_assoc($query)){
                        available($result['id'],$result['Images'],$result['M_name'], $result['V_number'], $result['Seat'], $result['Rent']);
                    }
                }
                else{
                    echo "Their is no data.";
                }
            ?>

        </div>
    </div>


    <?php

    function available($id,$Images,$M_name,$V_number,$Seat,$Rent){
        if(!isset($_SESSION['fname'])){
            $element= "
            <div class='card'>
                <img src='../agency/images/$Images' alt='car image'>
                <div class='details'>
                    <div class='info m-name'>
                        <i class='material-icons outlined'>directions_car</i>
                        <h1>$M_name</h1>
                    </div>
                    <div class='info m-number'>
                        <i class='material-icons outlined'>pin</i>
                        <h3>$V_number</h3>
                    </div>
                    <div class='info seat'>
                        <i class='material-icons outlined'>airline_seat_recline_normal</i>
                        <p>$Seat seats</p>
                    </div>
                    <div class='info rent'>
                        <i class='material-icons outlined'>currency_rupee</i>
                        <p>₹ $Rent/day </p>
                    </div>
                    <div class='info button'>
                        <a id='guestRent' href='../index.html'>Rent</a>
                    </div>
                </div>
            </div>";
            echo $element;
        }

        else{
            $element= "
            <div class='card'>
                <img src='../agency/images/$Images' alt='car image'>
                <div class='details'>
                    <div class='info m-name'>
                        <i class='material-icons outlined'>directions_car</i>
                        <h1>$M_name</h1>
                    </div>
                    <div class='info m-number'>
                        <i class='material-icons outlined'>pin</i>
                        <h3>$V_number</h3>
                    </div>
                    <div class='info seat'>
                        <i class='material-icons outlined'>airline_seat_recline_normal</i>
                        <p>$Seat seats</p>
                    </div>
                    <div class='info rent'>
                        <i class='material-icons outlined'>currency_rupee</i>
                        <p>₹ $Rent/day </p>
                    </div>
                    <div class='info button'>
                    <a id='Rent' href='detail.php?id=$id'>Rent</a>
                    </div>
                </div>
            </div>";
            echo $element;
        }
    };

    function welcome(){
        if(!isset($_SESSION['fname'])){
            ?>
                <nav>
                    <div class="logo-name">
                        <img src="../agency/images/logo.jpg" alt="Logo">
                        <h2>Carent</h2>
                    </div>
                    <div class="btn-box">
                        <a href="../index.html">
                            <input type="button" value="Login">
                        </a>
                    </div>
                </nav>

                <h2 id="fname">Hello Guest</h2> 
            <?php
        }
        else{
            ?>
                <nav>
                    <div class="logo-name">
                        <img src="../agency/images/logo.jpg" alt="Logo">
                        <h2>Carent</h2>
                    </div>
                    <div class="btn-box">
                        <a href="../logout.php">
                            <input type="button" value="Logout">
                        </a>
                    </div>
                </nav>

                <h2  id="fname" >Hello <?php echo $_SESSION['fname'] ?></h2> 
            <?php
        }
    };

    ?>

</body>
</html>