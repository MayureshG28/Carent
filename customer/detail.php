<?php

    session_start();

    if($_SESSION['role'] != 'customer'){
        header('location: ../index.html');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    <title>Car Details</title>
</head>
<body>

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

    <div class="selected-car">

        <?php
        
            include '../conn.php';

            $id = $_GET['id'];

            $select = "select * from car_details where id = $id";
            $query = mysqli_query($con, $select);
            $total = mysqli_num_rows($query);

            if($total > 0){
                while($result = mysqli_fetch_assoc($query)){
                    select($result['id'],$result['Images'],$result['M_name'], $result['V_number'], $result['Seat'], $result['Rent']);
                }
            }
            else{
                echo "Their is no data.";
            }
        ?>

    </div>

<?php
    function select($id,$Images,$M_name,$V_number,$Seat,$Rent){
        $element= "
            <div class='card-select'>
                <img src='../agency/images/$Images' alt='car image'>
                
                <form action='rent.php?id=$id' method='post'>
                    <div class='card-info'>
                    <div class='error-text'>This is an error message</div>
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
                        <div class='days'>
                            <h5>Enter No. of Days:</h5>
                            <input type='number' name='nodays' min='1' required>
                        </div>
                        <div class='info button'>
                            <button type='submit' id='rent'>Rent</button>
                        </div>
                    </div>
                </form>
            </div>
            ";
        echo $element;
    };

?>

</body>
</html>