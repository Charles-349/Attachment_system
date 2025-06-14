<?php
    session_start();
    include_once "../includes/config.php";
    $regno = mysqli_real_escape_string($conn, $_POST['regno']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($regno) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM students WHERE regno = '{$regno}'");
        if(mysqli_num_rows($sql) < 1){
            echo "Account does not exist!";
        }else{
            $result = mysqli_fetch_assoc($sql);

            $enc_pass = md5($password);

            if($enc_pass == $result['password']){
                $_SESSION['studentid'] = $result['uniqueid'];
                echo "success";
            }else{
                echo "Invalid credentials";
            }
        }
    }else{
        echo "All input fields are required!";
    }
?>