<?php

include "functions_all.php";

?>

<?php include "includes/header.php"; ?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content">
        <h4 class="text-success my-5 ml-2">Assigned Students</h4>
        <hr>
        <div class="row m-2">
        <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Student Reg.No</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Company Location</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php getAllAssignedStudents($ssupid);?>
                    </tbody>
                </table>
        </div>
    </div>
</section>
</body>

</html>