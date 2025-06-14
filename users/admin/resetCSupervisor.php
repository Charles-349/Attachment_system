<?php
include "includes/config.php";
$csupid = $_GET['id'];
$csupemail = $_GET['email'];


$query = "RESET FROM `company_supervisors` WHERE uniqueid = '$csupid'";
if (mysqli_query($conn, $query)) {
    ?>
        <script>
            alert("Reset Successfully");
        </script>
    <?php
    header("location: companysupervisors.php");
    } else {
        ?>
        <script>
            alert("Failed to Reset. Try again later");
        </script>
    <?php
    header("location: companysupervisors.php");
    }


?>