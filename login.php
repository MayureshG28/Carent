<?php

    session_start();

    include_once 'conn.php';

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($email) && !empty($password)){
        $email_search="select * from login where email = '$email'";
        $log_query = mysqli_query($con, $email_search);
     
        $emailcount=mysqli_num_rows($log_query);
        if($emailcount){
            $email_pass = mysqli_fetch_assoc($log_query);
            $dbpass = $email_pass['password'];

            $pass_decode= password_verify($password, $dbpass);
            if($pass_decode){

                if($email_pass['role'] === 'customer'){
                    $_SESSION['fname'] = $email_pass['First_name'];
                    $_SESSION['lname'] = $email_pass['Last_name'];
                    $_SESSION['role'] = $email_pass['role'];
                    $_SESSION['username'] = $email;
                    echo "Success";
                }
                else if ($email_pass['role'] === 'agent') {
                    $_SESSION['agency'] = $email_pass['Agency_name'];
                    $_SESSION['agent'] = $email_pass['Agent_name'];
                    $_SESSION['role'] = $email_pass['role'];
                    echo "Agency";
                } else {
                   echo "Their is some problem";
                } 
            }
            else{
                echo "Password is incorrect";
            }
        }
        else{
            echo "$email - This email doesnot exist";
        }
    }
    else{
        echo "All input field are required.";
    }

?>