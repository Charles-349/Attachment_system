<?php

function getAllAssignedStudents($csupid){
    include "includes/config.php";
    $supresult = mysqli_query($conn, "SELECT * from company_supervisors where uniqueid = '$csupid'");
    $suprow = mysqli_fetch_assoc($supresult);

    $result = mysqli_query($conn, "SELECT * from students where csupervisor ='$suprow[email]' ");

    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count++;
            $compresult = mysqli_query($conn, "SELECT * from tbl_registered_attachments where studentid ='$row[uniqueid]' ");
            $comrow = mysqli_fetch_assoc($compresult)
        ?>
            <tr>
                <th><?php echo $count ?></th>
                <td><?php echo $row['fname']." ".$row['lname']  ?></td>
                <td><?php echo $row['regno'] ?></td>
                <td><?php echo $comrow['companyname'] ?></td>
                <td><?php echo $comrow['companylocation'] ?></td>
                <td><?php echo $comrow['startdate'] ?></td>
                <td><?php echo $comrow['duration']." Weeks" ?></td>
                <td> <a href="assess.php?studentid=<?php echo $row['uniqueid'] ?>" class="btn btn-outline-success">Assess</a></td>
                <td> <a href="logbook.php?studentid=<?php echo $row['uniqueid'] ?>&week=1" class="btn btn-outline-success">Log book</a></td>
            </tr>
<?php
        }
    } else {
        echo "<tr><td colspan='5'>No Student Assigned</td></tr>";
    }
}

function getCAssessmentScore($id)
{
    include "includes/config.php";
    $cmarks = 0;
    $result = mysqli_query($conn, "SELECT *  from tbl_csupervisor_assess where studentid = $id");

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

?>