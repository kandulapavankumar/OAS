<?php
include 'verification.php';

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
WHERE sl.year ="'.$_SESSION['year'].'" AND sl.section = "'.$_SESSION['section'].'" AND sl.is_valid = "1"
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
                echo '<input type="hidden" class="s_id" value="'.$row[0].'">';
                echo '<input type="hidden" class="l_id" value="'.$row[1].'">';
                echo '<td><a href="#" onclick="formSubmit(this);" class="btn btn-default">View Assignments</a></td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4" style="text-align: center">No Subjects</td></tr>';
        }
        ?>
    </table>
    <form action="assignments.php" method="post" id="form-assignment">
        <input type="hidden" id="s_id" name="s_id">
        <input type="hidden" id="l_id" name="l_id">
    </form>
</div><!--/row-->
<script>
    function formSubmit(ele){
        var l_id =  $(ele).parent().parent().find(".l_id").val();
        var s_id =  $(ele).parent().parent().find(".s_id").val();
        $('#s_id').val(s_id);
        $('#l_id').val(l_id);
        $('#form-assignment').submit();
    }
</script>

<?php include 'footer.php' ?>


