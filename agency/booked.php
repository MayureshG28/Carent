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
    <title>All Cars</title>
</head>
<body>
    <div class="container" >
        <nav>
            <div class="logo-name">
                <img src="images/logo.jpg" alt="Logo">
                <h2>Carent</h2>
            </div>
            <div class="btn-box">
                <a href="booked.php">
                    <input type="button" id="show-btn" value="Booked Cars">
                </a>
                <a href="add.php">
                    <input type="button" id="add-btn" value="Add Car">
                </a>
                <a href="../logout.php">
                    <input type="button" value="Logout">
                </a>
            </div>
        </nav>

        <div class="avail-cars">
            <div class="switch"> 
                <button id="show-all">All Cars</button>
                <button id="show-avail">Available Cars</button>
                <button id="show-booked">Booked Cars</button>
            </div>

            <div class="all-cars" id="super">


                <?php
                    include '../conn.php';

                    $select = "select * from car_details";
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

            <div class="available-cars" id="main" style="display: none;">


                <?php
                    include '../conn.php';

                    $select = "select * from car_details where days = 0";
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

            <div class="booked-cars" id="sub" style="display: none;">
                <table>
                    <tr>
                        <th class="srno">Sr. No</th>
                        <th class="vmodel">Vehicle Model</th>
                        <th class="vnumber">Vehicle Number</th>
                        <th class="date">Date</th>
                        <th class="noofdays">No. of Days</th>
                        <th class="name">Name</th>
                        <th>Email</th>
                    </tr>
                    <?php
                        include '../conn.php';

                        $a = 1;
                        $select = "select * from car_details where days != 0";
                        $query = mysqli_query($con, $select);
                        $total = mysqli_num_rows($query);

                        if($total > 0){
                            while($result = mysqli_fetch_assoc($query)){
                                // booked($result['M_name'], $result['V_number'], $result['st_date'], $result['Days'], $result['F_name'], $result['L_name'], $result['username']);
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td ><?php echo $result['M_name'] ?></td>
                                    <td ><?php echo $result['V_number'] ?></td>
                                    <td ><?php echo $result['st_date'] ?></td>
                                    <td ><?php echo $result['Days'] ?></td>
                                    <td ><?php echo $result['F_name']." ". $result['L_name']?></td>
                                    <td ><?php echo $result['username'] ?></td>
                                </tr>
                                <?php
                                $a++;
                            }
                        }
                        else{
                            echo "Their is no data.";
                        }
                    ?> 
                  </table>
            </div>
        </div>
    </div>


<?php 

function available($id,$Images,$M_name,$V_number,$Seat,$Rent){
    $element= "
    <div class='card'>
        <img src='images/$Images' alt='car image'>
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
                <a name='delete' href='delete.php?id=$id'>Delete</a>
                <a id='edit' name='edit' href='edit.php?id=$id'>Edit</a>
            </div>
        </div>
    </div> 
    ";
    echo $element;
};

?>

    <script src="script.js"></script>

    <script>
        const allbtn = document.getElementById('show-all');
        const availbtn = document.getElementById('show-avail');
        const bookbtn = document.getElementById('show-booked');

        const allcar = document.getElementById('super')
        const availcar = document.getElementById('main');
        const bookcar = document.getElementById('sub');

        allbtn.onclick = ()=>{
            availcar.style.display = "none";
            bookcar.style.display = "none";
            allcar.style.display = "grid";
        };
        availbtn.onclick = ()=>{
            availcar.style.display = "grid";
            bookcar.style.display = "none";
            allcar.style.display = "none";
        };
        bookbtn.onclick = ()=>{
            availcar.style.display = "none";
            bookcar.style.display = "grid";
            allcar.style.display = "none";
        };
    </script>
</body>
</html>