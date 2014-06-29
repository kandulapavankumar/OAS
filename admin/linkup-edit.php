<?php
include 'verification.php';
include 'header.php';

$id = $_GET['id'];
$sql = 'SELECT subject_id, lecturer_id
FROM section_subject_lecturer
WHERE is_valid = "1" AND id = '.$id;
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_row($result)) {
        $subjectId = $row[0];
        $lecturerId = $row[1];
    }
}

?>
<div>
    <h4>Select Subject and Lecture to add Subjects</h4>
    <form method="post"  class="form-inline" action="linkup-edit-save.php">
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <div class="form-group">
            <label for="exampleInputYear">Subject</label>
        <?php
        $sql = 'select id, name, code from subjects';
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            echo '<select name = "subject_id" class="form-control">';
            while ($row = mysql_fetch_row($result)) {
                $selected = '';
                if($row[0] == $subjectId){
                    $selected = 'selected';
                }
                echo '<option value = '.$row[0].' '.$selected.'>'.$row[2].'-'.$row[1].'</option>';
            }
            echo '</select>';
        }?>
        </div>
        <div class="form-group">
            <label for="exampleInputLecture">Lecture</label>
        <?php $sql = 'select id, name, designation from lecturers';
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            echo '<select name = "lecturer_id" class="form-control">';
            while ($row = mysql_fetch_row($result)) {
                $selected = '';
                if($row[0] == $lecturerId){
                    $selected = 'selected';
                }
                echo '<option value = '.$row[0].' '.$selected.'>'.$row[1].'-'.$row[2].'</option>';
            }
            echo '</select>';
        }?>
        <input type="submit" value="Save">
        <input type=button onClick="location.href='subjects-linkup.php'" value='Cancel'><br>
    </form>
</div>
<?php include 'footer.php'; ?>