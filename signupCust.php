<?php
    session_start();

    include_once 'conn.php';

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){

        if(!preg_match("/^[a-zA-Z\s]+$/",$fname)){
            echo "First name must be had lettes only.";
        }
        else{
            if(!preg_match("/^[a-zA-Z\s]+$/",$lname)){
                echo "Last name must be had lettes only.";
            }
            else{
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $verify_query = " select * from login where email = '$email'";
        
                    $query = mysqli_query($con, $verify_query);
        
                    $count = mysqli_num_rows($query);
        
                    if($count>0){
                        echo "$email - This email is already exist";
                    }
                    else{

                        if(strlen($password) >= 8){
                            $en_pass = password_hash($password, PASSWORD_BCRYPT);
                            $insertquery = "insert into login (First_name, Last_name, email, password, role) values('$fname', '$lname', '$email', '$en_pass', 'customer')";
                            $sec_query = mysqli_query($con, $insertquery);
            
                            if($sec_query){
                                echo "Success";
                                $_SESSION['fname'] = $fname;
                                $_SESSION['lname'] = $lname;
                                $_SESSION['username'] = $email;
                                $_SESSION['role'] = 'customer';
                            }
                            else{
                                echo "Someting went wrong";
                            }
                        }else{
                            echo "Password must have 8 character.";
                        }
                    }
                }
                else{
                    echo "$email - This is not valid email-ID!";
                }
            }
        }
    }
    else{
        echo "All input field are required.";
    }

?>