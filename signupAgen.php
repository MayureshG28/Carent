<?php
    session_start();

    include_once 'conn.php';

    $agencyname = mysqli_real_escape_string($con, $_POST['fname']);
    $agentname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if(!empty($agencyname) && !empty($agentname) && !empty($email) && !empty($password)){

        if(!preg_match("/^[a-zA-Z\s]+$/",$agencyname)){
            echo "Agency name must be had lettes only.";
        }
        else{
            if(!preg_match("/^[a-zA-Z\s]+$/",$agentname)){
                echo "Agent name must be had lettes only.";
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
                            $insertquery = "insert into login (Agency_name, Agent_name, email, password, role) values('$agencyname', '$agentname', '$email', '$en_pass', 'agent')";
                            $sec_query = mysqli_query($con, $insertquery);
            
                            if($sec_query){
                                echo "Success";
                                $_SESSION['role'] = 'agent';
                                $_SESSION['agency'] = $email_pass['Agency_name'];
                                $_SESSION['agent'] = $email_pass['Agent_name'];
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