<?php
    session_start();
    include_once "../includes/config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($fname) && !empty($lname) && !empty($company) && !empty($email) && !empty($password)){
        $passlen = number_format(strlen($password));
        if($passlen >= 8){
            $sql = mysqli_query($conn, "SELECT * FROM company_supervisors WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "Supervisor already registered!";
            }else{
                $ran_id = rand(time(), 100000000);
                $encrypt_pass = md5($password);
                $insert_query = mysqli_query($conn, "INSERT INTO company_supervisors (uniqueid, firstname, lastname,company, email, password)
                                VALUES ('$ran_id', '$fname', '$lname', '$company', '$email', '$encrypt_pass')");
                if($insert_query){
                    echo "success";
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }
        }else{
            echo "Password should be min of 8 characters";
        }
    }else{
        echo "All input fields are required!";
    }
