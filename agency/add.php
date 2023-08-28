<?php
    session_start();

    if($_SESSION['role'] != 'agent'){
        header('location: ../index.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    <title>Admin page</title>
</head>
<body>
        <nav>
            <div class="logo-name">
                <img src="images/logo.jpg" alt="Logo">
                <h2>Carent</h2>
            </div>
            <div class="btn-box">
                <a href="booked.php">
                    <input type="button" id="show-btn" value="Booked Cars">
                </a>
                <a href="add.html">
                    <input type="button" id="add-btn" value="Add Car">
                </a>
                <a href="../logout.php">
                    <input type="button" value="Logout">
                </a>
            </div>
        </nav>

        <div class="wrapper add-car">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div class="heading">
                    <h2>Add New Car</h2>
                </div>
                <div class="error-text">This is an error message</div>
                <div class="field input">
                    <label for="name">Model Name</label>
                    <input type="text" name="m_name" id="name" placeholder="Enter model name" >
                </div>
                <div class="field input">
                    <label for="number">Vehicle Number</label>
                    <input type="text" name="v_number" id="number" placeholder="Enter model number" >
                </div>
                <div class="field input">
                    <label for="seat">Seating Capacity</label>
                    <input type="number" min="2" max="10" name="seat" id="seat" placeholder="Enter number of seats" >
                </div>
                <div class="field input">
                    <label for="price">Rent per day</label>
                    <input type="number" min="200" name="rent" id="price" placeholder="Enter rent per day" >
                </div>
                <div class="field file">
                    <label for="image">Vehicle Image</label>
                    <input type="file" name="image" id="image" >
                </div>
                <div class="field button">
                    <button type="submit" id="Add" name="add-car" >Add car</button>
                </div>
            </form>
        </div>

    <script src="js/add.js"></script>
</body>
</html>