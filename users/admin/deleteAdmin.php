<?php
include "includes/config.php";
$adminid = $_GET['id'];

$query = "DELETE FROM `admins` WHERE uniqueid = '$adminid' ";

if (mysqli_query($conn, $query)) {
?>
    <script>
        alert("Admin Deleted Successfully");
    </script>
<?php
header("location: admins.php");
} else {
    ?>
    <script>
        alert("Failed to delete Admin. Try again later");
    </script>
<?php
header("location: admins.php");
}

?>