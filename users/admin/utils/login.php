<?php
    session_start();
    include_once "../includes/config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM admins WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) < 1){
            echo "Account does not exist!";
        }else{
            $result = mysqli_fetch_assoc($sql);

            $enc_pass = md5($password);

            if($enc_pass == $result['password']){
                $_SESSION['adminid'] = $result['uniqueid'];
                echo "success";
            }else{
                echo "Invalid credentials";
            }
        }
    }else{
        echo "All input fields are required!";
    }
?>