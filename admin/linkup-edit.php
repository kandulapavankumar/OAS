<?php
include '../general/db.php';
include '../general/verify-login.php';
include '../general/verify-role.php';
include '../general/global-const.php';
verifyRole('admin');

$id = $_GET['id'];
$sql = 'SELECT subject_id, lecturer_id
FROM section_subject_lecturer
WHERE id = '.$id;
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_row($result)) {
        $subjectId = $row[0];
        $lecturerId = $row[1];
    }
}

?>
<form method="post" action="linkup-edit-save.php">
    <input type="hidden" value="<?php echo $id ?>" name="id">

    <?php
    $sql = 'select id, name, code from subjects';
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        echo '<select name = "subject_id">';
        while ($row = mysql_fetch_row($result)) {
            $selected = '';
            if($row[0] == $subjectId){
                $selected = 'selected';
            }
            echo '<option value = '.$row[0].' '.$selected.'>'.$row[2].'-'.$row[1].'</option>';
        }
        echo '</select>';
    }

    $sql = 'select id, name, designation from lecturers';
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        echo '<select name = "lecturer_id">';
        while ($row = mysql_fetch_row($result)) {
            $selected = '';
            if($row[0] == $lecturerId){
                $selected = 'selected';
            }
            echo '<option value = '.$row[0].' '.$selected.'>'.$row[1].'-'.$row[2].'</option>';
        }
        echo '</select>';
    }?>
    <input type="submit" value="Submit">
    <input type=button onClick="location.href='subjects-linkup.php'" value='Cancel'><br>
</form>