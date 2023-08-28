<?php 

    session_start();

    if($_SESSION['role'] != 'agent'){
        header('location: ../index.html');
    }

    include '../conn.php';
    error_reporting(0);

    $M_name = $_POST["m_name"];
    $V_number = mysqli_real_escape_string($con, $_POST['v_number']);
    $Seat = mysqli_real_escape_string($con, $_POST['seat']);
    $Rent = mysqli_real_escape_string($con, $_POST['rent']);

    if(!empty($M_name) && !empty($V_number) && !empty($Seat) && !empty($Rent)){
        $verify_num = "SELECT * FROM `car_details` WHERE V_number = '$V_number'";
        $query = mysqli_query($con, $verify_num);
        $count = mysqli_num_rows($query);

        if($count >0){
            echo "$V_number - This vehicle is already exist.";
        }
        else{
            $image= $_FILES['image'];
            $img_name = $image['name']; 
            $img_size = $image['size'];
            $img_tmp = $image['tmp_name'];
            $img_type  = $image['type'];

            if($img_size === 0){
                echo "Select an image.";
            }
            else{
                $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                $allowed_ext = ['jpg', 'png', 'jpeg'];

                if(in_array($img_ext, $allowed_ext)){
                    $time = time();
                    // $new_img_name = uniqid("IMG-",true).$time.'.'. $img_ext;
                    $new_img_name = "IMG-".$time.'.'.$img_ext;
                    $img_upload_path = 'images/'.$new_img_name;
                    $upload = move_uploaded_file($img_tmp, $img_upload_path);
                    if($upload){
                        $sql = "INSERT INTO `car_details` (M_name, V_number, Seat, Rent, images) VALUES ('$M_name','$V_number','$Seat','$Rent','$new_img_name')";
                        $query = mysqli_query($con, $sql);
                        if($query){
                            echo "Success";
                        }
                        else{
                            echo "Somthing went wrong";
                        }
                    }
                    else{
                        echo "Image is not uploaded.";
                    }
                }
                else{
                    echo "File type must be - jpg, jpeg or png";
                }
            }
        }
    }
    else{
        echo "All input fields are required.";
    }
?>