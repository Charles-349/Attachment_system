<?php 

include "functions_all.php";
include "includes/header.php";
?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Main Dashboard</h4>
        <div class="row ml-2">
            <div class="m-2">
                <a href="pdfs/attachments.php" target="_blank" class="btn btn-outline-primary">Export Attachments List</a>
            </div>
            
        </div>
        <div class="list-card">
            <h3>Results</h3>
            <hr />
            <h4><span class="text-success"><?php echo getNumOfStudentsRegistered() ?></span> Attached</h4>
            <h4><span class="text-success"><?php echo getNumOfStudentsAssessed() ?></span> Assessed</h4>
            <div class="pdf-btns mt-3">
                <div class="mr-2">
                    <a href="pdfs/passlist.php" target="_blank" class="btn btn-outline-success">Export Pass List</a>
                </div>
                <div class="">
                    <a href="pdfs/faillist.php" target="_blank" class="btn btn-outline-danger">Export Fail List</a>
                </div>
            </div>
            <p class="mt-2"> <i>NB: The list will be for assessed students only</i> </p>
        </div>
        <div class="row ml-2">
            <div class="card col col-sm-6 col-md-6 col-lg-3 m-1">
                <div class="card-body">
                    <h5 class="text-center">Attachments</h5>
                    <h1 class="text-center text-primary"><?php echo getNumOfAttachments() ?></h1>
                </div>
            </div>
            <div class="card col-6 col-sm-6 col-md-6 col-lg-3 m-1">
                <div class="card-body">
                    <h5 class="text-center">Students</h5>
                    <h1 class="text-center text-primary"><?php echo getNumOfStudents() ?></h1>
                </div>
            </div>
            <div class="card col-6 col-sm-6 col-md-6 col-lg-3 m-1">
                <div class="card-body">
                    <h5 class="text-center">Registered for Attachment</h5>
                    <h1 class="text-center text-primary"><?php echo getNumOfStudentsRegistered() ?></h1>
                </div>
            </div>
            <div class="card col-6 col-sm-6 col-md-6 col-lg-3 m-1">
                <div class="card-body">
                    <h5 class="text-center">School Supervisors</h5>
                    <h1 class="text-center text-primary"><?php echo getNumOfSchoolSupervisors() ?></h1>
                </div>
            </div>
            <div class="card col-6 col-sm-6 col-md-6 col-lg-3 m-1">
                <div class="card-body">
                    <h5 class="text-center">Company Supervisors</h5>
                    <h1 class="text-center text-primary"><?php echo getNumOfCompanySupervisors() ?></h1>
                </div>
            </div>
        </div>
        
    </div>
</section>
</body>

</html>