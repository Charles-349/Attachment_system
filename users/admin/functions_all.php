<?php

function getNumOfStudents()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from students");

    return mysqli_num_rows($result);
}

function getNumOfAttachments()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from tbl_attachments");

    return mysqli_num_rows($result);
}

function getNumOfSchoolSupervisors()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from school_supervisors");

    return mysqli_num_rows($result);
}

function getNumOfCompanySupervisors()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from company_supervisors");

    return mysqli_num_rows($result);
}

function getAllAdmins()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from admins where uniqueid != $_SESSION[adminid] ");

    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
?>
            <tr>
                <th><?php echo $count ?></th>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['lastname'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><a href="deleteAdmin.php?id=<?php echo $row['uniqueid'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php
        }
    } else {
        echo "No admin";
    }
}
function getAllStudents()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from students");

    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
        ?>
            <tr>
                <th><?php echo $count ?></th>
                <td><?php echo $row['fname'] ?></td>
                <td><?php echo $row['lname'] ?></td>
                <td><?php echo $row['regno'] ?></td>
                <td><?php echo $row['course'] ?></td>
                <td><?php echo $row['year'] ?></td>
                <td><a href="passreset.php?studentid=<?php echo $row['uniqueid'] ?>" class="btn btn-success">Reset</a></td>
                <td><a href="deleteStudent.php?id=<?php echo $row['uniqueid'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php
        }
    } else {
        echo "<tr><td>No student</td></tr>";
    }
}
function getAttachedStudents()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT students.*, tbl_registered_attachments.* FROM students INNER JOIN `tbl_registered_attachments` ON students.uniqueid = tbl_registered_attachments.studentid");

    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
        ?>
            <tr>
                <th><?php echo $count ?></th>
                <td><?php echo $row['fname'] ." ". $row['lname'] ?></td>
                <td><?php echo $row['regno'] ?></td>
                <td><?php echo $row['course'] ?></td>
                <td><?php echo $row['supervisor'] ?></td>
                <td><?php echo $row['csupervisor'] ?></td>
                <td><?php echo $row['companyname']."<br>". $row['companylocation']."<br>". $row['companyaddress']?></td>
                <td><a href="attachedstudents.php?studentid=<?php echo $row['uniqueid'] ?>" class="btn btn-success">View</a></td>
            </tr>
        <?php
        }
    } else {
        echo "<tr><td>No student</td></tr>";
    }
}



function getFilteredStudents($year, $course){
    include "includes/config.php";

    $query = "";
    if($year=="all"){
        $query = "SELECT * from students WHERE course = '$course'";
    }else if($course=="all"){
        $query = "SELECT * from students WHERE year = '$year'";
    }else{
        $query = "SELECT * from students WHERE course = '$course' AND year = '$year' ";

    }

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
        ?>
            <tr>
                <th><?php echo $count ?></th>
                <td><?php echo $row['fname'] ?></td>
                <td><?php echo $row['lname'] ?></td>
                <td><?php echo $row['regno'] ?></td>
                <td><?php echo $row['course'] ?></td>
                <td><?php echo $row['year'] ?></td>
                <td><a href="passreset.php?studentid=<?php echo $row['uniqueid'] ?>" class="btn btn-success">Reset</a></td>
            </tr>
        <?php
        }
    } else {
        echo "<tr><td>No student</td></tr>";
    }
}

function getNumOfStudentsRegistered()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from tbl_registered_attachments");

    return mysqli_num_rows($result);
}

function getNumOfStudentsAssessed()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT tbl_supervisor_assess.studentid from tbl_supervisor_assess INNER JOIN tbl_csupervisor_assess ON tbl_supervisor_assess.studentid = tbl_csupervisor_assess.studentid");

    return mysqli_num_rows($result);
}

function getCAssessmentScore($id)
{
    include "includes/config.php";
    $cmarks = 0;
    $result = mysqli_query($conn, "SELECT tbl_supervisor_assess.*,tbl_csupervisor_assess.*  from tbl_supervisor_assess INNER JOIN tbl_csupervisor_assess ON tbl_supervisor_assess.studentid = tbl_csupervisor_assess.studentid where tbl_supervisor_assess.studentid= $id and tbl_csupervisor_assess.studentid = $id");

    $row = mysqli_fetch_assoc($result);

    $cmarks += $row['onemarks'];
    $cmarks += $row['twomarks'];
    $cmarks += $row['threeamarks'];
    $cmarks += $row['threebmarks'];
    $cmarks += $row['threecmarks'];
    $cmarks += $row['threedmarks'];
    $cmarks += $row['fivemarks'];
    $cmarks += $row['sixmarks'];
    $cmarks += $row['sevenmarks'];
    $cmarks += $row['eightmarks'];
    $cmarks += $row['ninemarks'];
    $cmarks += $row['tenmarks'];
    $cmarks += $row['elevenmarks'];
    $cmarks += $row['twelvemarks'];
    $cmarks += $row['thirteenmarks'];
    $cmarks += $row['fourteenmarks'];
    $cmarks += $row['fifteenmarks'];

    return $cmarks;
}

function getSAssessmentScore($id)
{
    include "includes/config.php";
    $smarks = 0;
    $result = mysqli_query($conn, "SELECT tbl_supervisor_assess.*,tbl_csupervisor_assess.*  from tbl_supervisor_assess INNER JOIN tbl_csupervisor_assess ON tbl_supervisor_assess.studentid = tbl_csupervisor_assess.studentid where tbl_supervisor_assess.studentid= $id and tbl_csupervisor_assess.studentid = $id");

    $row = mysqli_fetch_assoc($result);

    $smarks+= $row['intelmarks'];
    $smarks+= $row['indmarks'];
    $smarks+= $row['commarks'];
    $smarks+= $row['innomarks'];
    $smarks+= $row['appmarks'];

    return $smarks;
}


function getAssessmentResult($id)
{
    include "includes/config.php";
    $cmarks = 0;
    $smarks = 0;
    $result = mysqli_query($conn, "SELECT tbl_supervisor_assess.*,tbl_csupervisor_assess.*  from tbl_supervisor_assess INNER JOIN tbl_csupervisor_assess ON tbl_supervisor_assess.studentid = tbl_csupervisor_assess.studentid where tbl_supervisor_assess.studentid= $id and tbl_csupervisor_assess.studentid = $id");

    $row = mysqli_fetch_assoc($result);

    $smarks+= $row['intelmarks'];
    $smarks+= $row['indmarks'];
    $smarks+= $row['commarks'];
    $smarks+= $row['innomarks'];
    $smarks+= $row['appmarks'];

    $cmarks += $row['onemarks'];
    $cmarks += $row['twomarks'];
    $cmarks += $row['threeamarks'];
    $cmarks += $row['threebmarks'];
    $cmarks += $row['threecmarks'];
    $cmarks += $row['threedmarks'];
    $cmarks += $row['fivemarks'];
    $cmarks += $row['sixmarks'];
    $cmarks += $row['sevenmarks'];
    $cmarks += $row['eightmarks'];
    $cmarks += $row['ninemarks'];
    $cmarks += $row['tenmarks'];
    $cmarks += $row['elevenmarks'];
    $cmarks += $row['twelvemarks'];
    $cmarks += $row['thirteenmarks'];
    $cmarks += $row['fourteenmarks'];
    $cmarks += $row['fifteenmarks'];

    $total = ($cmarks*2.5+$smarks*(100/30))/2;

    return $total;
}

function getAssignedAdmins()
{
    include "includes/config.php";
    $stresult = mysqli_query($conn, "SELECT * from students where supervisor != ''");
    if (mysqli_num_rows($stresult) > 0) {
        $count =0;
        while ($row = mysqli_fetch_assoc($stresult)) {
            $count++;
        ?>
            <tr>
                <th><?php echo $count ?></th>
                <td><?php echo $row['fname'] . " " . $row['lname']; ?></td>
                <td><?php echo $row['regno'] ?></td>
                <td><?php echo $row['supervisor'] ?></td>
                <td><?php echo $row['csupervisor'] ?></td>
            </tr>
        <?php
        }
    } else {
        echo "<tr><td colspan='7'>No student to assign supervisor</td></tr>";
    }
}


function getAllAttachments()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from tbl_attachments");

    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
        ?>
            <tr>
                <th><?php echo $count ?></th>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['cname'] ?></td>
                <td><?php echo $row['category'] ?></td>
                <td><?php echo $row['location'] ?></td>
                <td><?php echo $row['startdate'] ?></td>
            </tr>
        <?php
        }
    } else {
        echo "No admin";
    }
}

function getAllCompanySupervisors()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from company_supervisors");

    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
        ?>
            <tr>
                <th><?php echo $count ?></th>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['lastname'] ?></td>
                <td><?php echo $row['company'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><a href="deleteCSupervisor.php?id=<?php echo $row['uniqueid'] ?>&email=<?php echo $row['email'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php
        }
    } else {
        echo "<tr><td colspan='5'>No Supervisor</td></tr>";
    }
}

function getAllSchoolSupervisors()
{
    include "includes/config.php";
    $result = mysqli_query($conn, "SELECT * from school_supervisors");

    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
        ?>
            <tr>
                <th><?php echo $count ?></th>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['lastname'] ?></td>
                <td><?php echo $row['department'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><a href="deleteSsupervisor.php?id=<?php echo $row['uniqueid'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
<?php
        }
    } else {
        echo "<tr><td colspan='5'>No Supervisor</td></tr>";
    }
}

?>
