<?php
include 'verification.php';

include 'header.php';

$sql = 'SELECT sl.subject_id, sl.year, sl.section, s.name, s.code
FROM section_subject_lecturer as sl
LEFT JOIN subjects as s
ON sl.subject_id = s.id
WHERE sl.lecturer_id ="'.$_SESSION['user_id'].'" AND sl.is_valid = "1"
';
$subjectDetails = mysql_query($sql);

?>
<div class="">
    <table class="table table-hover course-table">
        <tr>
            <th width="25%">Subject</th>
            <th width="25%">Year</th>
            <th width="25%">Section</th>
            <th width="25%"></th>
        </tr>
        <?php
        if (mysql_num_rows($subjectDetails) > 0) {
            while ($row = mysql_fetch_row($subjectDetails)) {

                echo '<tr>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[2].'</td>';
                echo '<input type="hidden" class="s_id" value="'.$row[0].'">';
                echo '<input type="hidden" class="l_id" value="'.$row[1].'">';
                echo '<td><form action="assignments.php" method="post">
                <input type="hidden" name="year" value="'.$row[1].'">
                <input type="hidden" name="section" value="'.$row[2].'">
                <input type="hidden" name="s_id" value="'.$row[0].'">
                <input type="submit" value="View Assignments" class="btn btn-default">
                </form>
                </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4" style="text-align: center">No Subjects</td></tr>';
        }
        ?>
    </table>
</div><!--/row-->
<?php include 'footer.php';?>