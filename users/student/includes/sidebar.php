<?php
include "config.php";
$sid  = $_SESSION['studentid'];

$result = $conn->query("SELECT * FROM students where uniqueid = '$sid' ");

$array = mysqli_fetch_assoc($result);

?>

<div class="col col-sm-12 col-md-4 col-lg-2 sidebar py-5">
    <h4 class="text-center welcome">
   <span> Welcome </span><?php echo $array['fname']." ".$array['lname']  ?>
    </h4>
    <hr>
    <div class="side-nav py-2">
        <a href="index.php" class="side-nav-item">
            <div> <i class="fa fa-home mr-3" aria-hidden="true"></i> Dashboard</div>
        </a>
        <a href="tests.php" class="side-nav-item">
            <div><i class="fa fa-list mr-3" aria-hidden="true"></i> Tests</div>
        </a>
        <a href="attachments.php" class="side-nav-item">
            <div><i class="fa fa-map-marker mr-3 text-white" aria-hidden="true"></i> Attachment Opportunities</div>
        </a>
        
        <a href="registerattachment.php" class="side-nav-item">
            <div><i class="fa fa-map-marker mr-3" aria-hidden="true"></i> Register for Attachment</div>
        </a>
        <a href="logbook.php" class="side-nav-item">
            <div><i class="fa fa-map-marker mr-3" aria-hidden="true"></i> Log Book</div>
        </a>
    </div>
</div>