<?php
session_start();
include_once "../includes/config.php";

if (!isset($_GET['studentid'])) {
    echo "No Id Specified";
} else {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $studentid = $_GET['studentid'];

    if (!empty($password) && !empty($studentid)) {
        $passlen = number_format(strlen($password));
        if ($passlen >= 8) {
            $encpass = md5($password);

            $sql = mysqli_query($conn, "SELECT * FROM students WHERE uniqueid = '{$studentid}'");
            if (mysqli_num_rows($sql) < 0) {
                echo "Student does not exist!";
            } else {
                $res = $conn->query("UPDATE students SET password='$encpass' where uniqueid='$studentid'");
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
