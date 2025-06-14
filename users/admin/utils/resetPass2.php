<?php
session_start();
include_once "../includes/config.php";

if (!isset($_GET['csupid'])) {
    echo "No Id Specified";
} else {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $csupid = $_GET['csupid'];

    if (!empty($password) && !empty($csupid)) {
        $passlen = number_format(strlen($password));
        if ($passlen >= 8) {
            $encpass = md5($password);

            $sql = mysqli_query($conn, "SELECT * FROM company_supervisors WHERE uniqueid = '{$csupid}'");
            if (mysqli_num_rows($sql) < 0) {
                echo "company supervisor does not exist!";
            } else {
                $res = $conn->query("UPDATE company_supervisors SET password='$encpass' where uniqueid='$csupid'");
                if($res){
                    echo "success";
                }else{
                    echo "Failed";
                }
            }
        } else {
            echo "Password should be min of 8 characters";
        }
    } else {
        echo "All input fields are required!";
    }
}
