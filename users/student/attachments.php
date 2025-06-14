<?php
session_start();
if (!isset($_SESSION['studentid'])) {
    header("location: login.php");
}
$sid  = $_SESSION['studentid'];

include "myFunctions.php";
?>

<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Available Attachment Opportunities</h4>
        <div class="row ml-2">
            <?php if (testsDone($sid) == 3) : ?>
                <h5 class="m-3 text-primary">Based of the tests done, we recommend you to apply for <strong><?php echo getBestScored($sid) ?></strong> related attachment</h5>
            <?php else: ?>
            <h5 class="m-3 text-primary">You are yet to take the 3 tests. Kindly do so to get your recommended attachment field</h5>
            <?php endif ?>
        </div>
        <div class="row m-2">
            <div class="col col-12">
                <h4>Recommended Attachments</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Location</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo getRecommendedAttachments($sid) ?>
                    </tbody>
                </table>
                <hr>
                <br>
            </div>
            <div class="col col-12">
                <h4>Other Attachments</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Location</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        echo getAllAttachments($sid) 
                        
                        ?>
                    </tbody>
                </table>
                <hr>
                <br>
            </div>
        </div>
    </div>
</section>
<?php include "includes/footer.php"; ?>