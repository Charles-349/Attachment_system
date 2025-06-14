<?php
session_start();
if (!isset($_SESSION['studentid'])) {
    header("location: login.php");
}
$sid  = $_SESSION['studentid'];

include "myFunctions.php";

$sql = mysqli_query($conn, "SELECT * FROM students WHERE uniqueid = '$sid' ");
if (mysqli_num_rows($sql) > 0) {
    $arr = mysqli_fetch_assoc($sql);
}

?>

<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Main Dashboard</h4>
        <hr>
        <div class="row m-2">
            <div class="col">
                <h2 class="text-success"><?php echo testsDone($sid) ?> Test Done</h2>
                <?php if (testsDone($sid) == 3) : ?>
                    <h3 style="text-transform: capitalize;">You are recomended for attachment on <span class="text-primary"><?php echo getBestScored($sid) ?></span> field</h3>
                    <!-- <h3>Your Score <?php echo calculateScore(getBestScored($sid), $sid) ?></h3> -->
                <?php endif ?>
                <?php if (testsDone($sid) == 0) : ?>
                    <a href="tests.php" class="btn btn-primary">Go To Tests</a>
                <?php endif ?>
            </div>
            <div class="col col-12">
                <hr>
                <h2 class="text-success">Attachment Status</h2>
                <?php if (checkIfRegisteredAttachment($sid) == "true") : ?>
                    <h5>You have already added attachment details</h5>
                    <a href="registerattachment.php" class="btn btn-primary">View Details</a>

                    <h2 class="text-success">Supervisor details</h2>
                    <h5>School Supervisor Email: <?php
                                            if ($arr['supervisor'] != "") {
                                                echo $arr['supervisor'];
                                            } else {
                                                echo "Not Assigned Yet";
                                            }
                                            ?></h5>
                    <h5>Company Supervisor Email: <?php
                                            if ($arr['csupervisor'] != "") {
                                                echo $arr['csupervisor'];
                                            } else {
                                                echo "Not Assigned Yet";
                                            }
                                            ?></h5>
                    
                <?php else : ?>
                    <h5>No attachment details have been added</h5>
                    <a href="registerattachment.php" class="btn btn-primary">Add Details</a>
                <?php endif ?>
            </div>
        </div>
    </div>
    
</section>
<?php include "includes/footer.php"; ?>