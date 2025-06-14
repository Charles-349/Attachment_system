<?php

function getAllAssignedStudents($ssupid){
    include "includes/config.php";
    $supresult = mysqli_query($conn, "SELECT * from school_supervisors where uniqueid = '$ssupid'");
    $suprow = mysqli_fetch_assoc($supresult);

    $result = mysqli_query($conn, "SELECT * from students where supervisor ='$suprow[email]' ");

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

?>