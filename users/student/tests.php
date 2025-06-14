<?php
session_start();
include "includes/config.php";
include "myFunctions.php";

if (!isset($_SESSION['studentid'])) {
    header("location: login.php");
}
$sid  = $_SESSION['studentid'];
?>

<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">All Tests</h4>
        <div class="row ml-2">
            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="images/hardware.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h3>Hardware Test</h3>

                    <h5><?php echo numOfQuestionsAnswerd("hardware", $sid) ?> of 10 questions answered</h5>
                    <?php if (numOfQuestionsAnswerd("hardware", $sid) < 10) : ?>
                        <a href="starttest.php?test=hardware" class="btn btn-outline-success btn-lg">Take Test</a>
                    <?php else : ?>
                        <h4>Score: <?php echo calculateScore("hardware", $sid)."/".numOfQuestionsAnswerd("hardware", $sid); ?></h4>
                    <?php endif ?>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="images/software.png" alt="Card image cap">
                <div class="card-body">
                    <h3>Software Test</h3>
                    <h5><?php echo numOfQuestionsAnswerd("software", $sid) ?> of 10 questions answered</h5>
                    <?php if (numOfQuestionsAnswerd("software", $sid) < 10) : ?>
                        <a href="starttest.php?test=software" class="btn btn-outline-success btn-lg">Take Test</a>
                    <?php else : ?>
                        <h4>Score: <?php echo calculateScore("software", $sid)."/".numOfQuestionsAnswerd("software", $sid); ?></h4>
                    <?php endif ?>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="images/networking.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h3>Networking Test</h3>
                    <h5><?php echo numOfQuestionsAnswerd("networking", $sid) ?> of 10 questions answered</h5>
                    <?php if (numOfQuestionsAnswerd("networking", $sid) < 10) : ?>
                        <a href="starttest.php?test=networking" class="btn btn-outline-success btn-lg">Take Test</a>
                    <?php else : ?>
                        <h4>Score: <?php echo calculateScore("networking", $sid)."/".numOfQuestionsAnswerd("networking", $sid); ?></h4>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "includes/footer.php"; ?>