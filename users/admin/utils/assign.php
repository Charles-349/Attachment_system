<?php
include "../includes/config.php";
$regno = mysqli_real_escape_string($conn, $_POST['regno']);
$supervisor = mysqli_real_escape_string($conn, $_POST['supervisor']);

if (!empty($regno) && !empty($supervisor)) {
    $sql = mysqli_query($conn, "SELECT * FROM students WHERE regno='$regno' and supervisor != ''");
    if (mysqli_num_rows($sql) > 0) {
        echo "Supervisor already assigned for the student";
    } else {
        $update = mysqli_query($conn, "UPDATE students  SET supervisor = '$supervisor' where regno = '$regno' ");
        if ($update) {
            echo "success";
        } else {
            echo "Could Not Assign Supervisor";
        }
    }
} else {
    echo "All input fields are required!";
}
?>