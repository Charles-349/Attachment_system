<?php
session_start();
include_once "../includes/config.php";
$name = mysqli_real_escape_string($conn, $_POST['name']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$role = mysqli_real_escape_string($conn, $_POST['role']);
$duration = mysqli_real_escape_string($conn, $_POST['duration']);
$startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
$studentid = mysqli_real_escape_string($conn, $_POST['studentid']);

if (!empty($name) && !empty($address) && !empty($location) && !empty($contact) && !empty($role) && !empty($duration) && !empty($startdate) && !empty($studentid)) {
    $checkresult = mysqli_query($conn, "SELECT * FROM tbl_registered_attachments where studentid = '$studentid'");
    if ($duration > 12) {
        echo "Maximum duration for attachment is 12 weeks";
    } else {
        if (mysqli_num_rows($checkresult) < 1) {
            $insert_query = mysqli_query($conn, "INSERT INTO tbl_registered_attachments (`studentid`, `companyname`, `companylocation`, `companyaddress`, `companycontact`, `role`, `duration`, `startdate`)
                                    VALUES ('$studentid', '$name', '$location', '$address', '$contact','$role','$duration','$startdate')");
            if ($insert_query) {
                echo "success";
            } else {
                echo "Something went wrong. Please try again!";
            }
        } else {
            echo "You have already registered an attachment";
        }
    }
} else {
    echo "All input fields are required!";
}
