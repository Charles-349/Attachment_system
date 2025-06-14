<?php
include "functions_all.php";
include "includes/header.php";


?>
<section class="content row">
    <?php include "includes/sidebar.php"; ?>

    <div class="col col-sm-12 col-md-8 col-lg-10 main-content py-4 px-5">
        <div class="row mt-3">
            <?php if(!isset($_GET["studentid"])): ?>
            <div class="col">
                <h2 class="text-success">Attached Students</h2>
                <div class="d-flex justify-content-end">
                    <a href="pdfs/attachedstudents.php" target="_blank" class="m-3 btn btn-warning"><i class="fa fa-pdf" aria-hidden="true"></i>Export PDF</a> 
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Reg No</th>
                            <th scope="col">Course</th>
                            <th scope="col">School Supervisor</th>
                            <th scope="col">Company Supervisor</th>
                            <th scope="col">Company</th>
                            <th scope="col">Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            getAttachedStudents();
                        ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="col">
                    <h2>Student Attachment Performance</h2>
                    <table class="table table-hover col col-12 col-md-6">
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>School Supervisor Assessment</td>
                                <td><?php echo  getSAssessmentScore($_GET["studentid"]) ." / 30"?></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Company Supervisor Assessment</td>
                                <td colspan="2"><?php echo  getCAssessmentScore($_GET["studentid"]) ." / 40" ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Total</th>
                                <td colspan="2"><?php echo  getCAssessmentScore($_GET["studentid"])+getSAssessmentScore($_GET["studentid"]) ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            <?php endif ?>
        </div>
    </div>
</section>

<script>
</script>
</body>

</html>