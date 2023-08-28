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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Portal</title>
</head>
<body style="background-image: url('bg/bg1.jpg')">
    
    <nav>
        <div class="logo-name">
            <img src="images/logo.jpg" alt="Logo">
            <h2>Carent</h2>
        </div>
        <div class="btn-box">
            <a href="../logout.php">
                <input type="button" value="Logout">
            </a>
        </div>
    </nav>

   
    <div class="wrapper add-car">

        <?php
            include '../conn.php';  

            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $select = "select * from car_details where id = $id";
                $query = mysqli_query($con, $select);
                $total = mysqli_num_rows($query);

                if($total > 0){
                    while($result = mysqli_fetch_assoc($query)){
                        ?>
                            <form action="update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                <div class="heading">
                                    <h2>Edit Car information</h2>
                                </div>
                                <div class="error-text">This is an error message</div>
                                <div class="field input">
                                    <label for="name">Model Name</label>
                                    <input type="text" name="m_name" id="name" value=<?php echo $result['M_name'];?>  placeholder="Enter model name" required>
                                </div>
                                <div class="field input">
                                    <label for="number">Vehicle Number</label>
                                    <input type="text" name="v_number" id="number" value=<?php echo $result['V_number'];?> placeholder="Enter model number" required>
                                </div>
                                <div class="field input">
                                    <label for="seat">Seating Capacity</label>
                                    <input type="number" min="2" max="10" name="seat" id="seat" value=<?php echo $result['Seat'];?> placeholder="Enter number of seats" required>
                                </div>
                                <div class="field input">
                                    <label for="price">Rent per day</label>
                                    <input type="number" min="200" name="rent" id="price" value=<?php echo $result['Rent'];?> placeholder="Enter rent per day" required>
                                </div>
                                <div style="border-top: 1px solid black" class="field button">
                                    <button style="margin-top:25px" type="submit" id="Add" name="add-car" >Update</button>
                                </div>
                            </form>
                        <?php

                    }
                }
                else{
                    echo "Their is no data.";
                }
            }
            else{
                die('id not proided.');
            } 
        ?>
    </div>

    
</body>
</html>