<?php
session_start();
include_once "../includes/config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$regno = mysqli_real_escape_string($conn, $_POST['regno']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$course = mysqli_real_escape_string($conn, $_POST['course']);
$year = mysqli_real_escape_string($conn, $_POST['year']);

if (!empty($fname) && !empty($lname) && !empty($regno) && !empty($password) && !empty($course) && !empty($year)) {
    $passlen = number_format(strlen($password));
    if ($passlen >= 8) {
        $sql = mysqli_query($conn, "SELECT * FROM students WHERE regno = '{$regno}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "Account already registered!";
        } else {
            $ran_id = rand(time(), 100000000);
            $encrypt_pass = md5($password);
            $insert_query = mysqli_query($conn, "INSERT INTO students (uniqueid, fname, lname, regno, password, course, year)
                                VALUES ('{$ran_id}', '{$fname}', '{$lname}', '{$regno}', '{$encrypt_pass}', '{$course}', '{$year}')") or die($conn->error);
            if ($insert_query) {
                echo "success";
            } else {
                echo "Something went wrong. Please try again!";
            }
        }
    } else {
        echo "Password should be min of 8 characters";
    }
} else {
    echo "All input fields are required!";
}
