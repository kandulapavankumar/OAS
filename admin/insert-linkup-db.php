<?php
include '../general/db.php';
include '../general/verify-login.php';
include '../general/verify-role.php';
include '../general/global-const.php';
verifyRole('admin');

$year = $_POST['year'];
$section = $_POST['section'];
$subjectId = $_POST['subject_id'];
$lecturerId = $_POST['lecturer_id'];
if($year && $section && $subjectId && $lecturerId){
    $sql = 'INSERT INTO section_subject_lecturer(year, section, subject_id, lecturer_id, created_at) VALUES("'.$year.'", "'.$section.'", "'.$subjectId.'", "'.$lecturerId.'", now())';
    $result = mysql_query($sql);
    $message = 'Inserted Successfully';
} else {
    $message = 'invalid parameters';
}
?>
<form id="form" action="subjects-linkup.php" method="post">
    <input type="hidden" value="<?php echo $message ?>" name="message">
</form>
<script>document.getElementById("form").submit();</script>
