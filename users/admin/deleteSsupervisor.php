<?php
include "includes/config.php";
$csupid = $_GET['id'];


$query = "DELETE FROM `school_supervisors` WHERE uniqueid = '$csupid'";
if (mysqli_query($conn, $query)) {
    ?>
        <script>
            alert("Supervisor Deleted Successfully");
        </script>
    <?php
    header("location: schoolsupervisors.php");
    } else {
        ?>
        <script>
            alert("Failed to delete Supervisor. Try again later");
        </script>
    <?php
    header("location: schoolsupervisors.php");
    }


?>