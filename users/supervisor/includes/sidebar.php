<?php
include "config.php";
$result = $conn->query("SELECT * FROM school_supervisors where uniqueid = '$ssupid' ");

$array = mysqli_fetch_assoc($result);

?>

<div class="col col-sm-12 col-md-4 col-lg-2 sidebar py-5">
    <h4 class="text-center welcome">
   <span> Welcome </span><?php echo $array['firstname']." ".$array['lastname']  ?>
    </h4>
    <hr>
    <div class="side-nav py-2">
    <a href="index.php" class="side-nav-item">
            <div> <i class="fa fa-home mr-3" aria-hidden="true"></i> Dashboard</div>
        </a>
        <a href="assignedstudents.php" class="side-nav-item">
            <div> <i class="fa fa-home mr-3" aria-hidden="true"></i> Assigned Students</div>
        </a>
    </div>
</div>