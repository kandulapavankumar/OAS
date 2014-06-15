<?php
include '../general/db.php';
include '../general/verify-login.php';
include '../general/verify-role.php';
verifyRole('student');

$sql = 'select year,section from students where id = "'.$_SESSION['user_id'].'"';
$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_row($result)) {
        $_SESSION['year'] = $row[0];
        $_SESSION['section'] = $row[1];
    }
}
$sql = 'SELECT sl.subject_id, sl.lecturer_id, s.name, s.code, l.name
FROM section_subject_lecturer as sl
LEFT JOIN subjects as s
ON sl.subject_id = s.id
LEFT JOIN lecturers as l
ON sl.lecturer_id = l.id
WHERE sl.year ="'.$_SESSION['year'].'" AND sl.section = "'.$_SESSION['section'].'"
';
$subjectDetails = mysql_query($sql);

include 'header.php'

?>

<div>
    <table class="table table-hover course-table">
        <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Lecturer</th>
            <th></th>
        </tr>
        <?php
        if (mysql_num_rows($subjectDetails) > 0) {
            while ($row = mysql_fetch_row($subjectDetails)) {
                echo '<tr>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[2].'</td>';
                echo '<td>'.$row[4].'</td>';
                echo '<td><a href="assignments.php>" class="btn btn-default">View Assignments</a></td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4" style="text-align: center">No Subjects</td></tr>';
        }
        ?>
    </table>
</div><!--/row-->


<?php include 'footer.php' ?>


