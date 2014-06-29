<?php
include 'verification.php';
$year = $_POST['year'];
$section = $_POST['section'];
$subjectId = $_POST['subject_id'];
$lecturerId = $_POST['lecturer_id'];
if($year && $section && $subjectId && $lecturerId){
    $sql = 'INSERT INTO section_subject_lecturer(year, section, subject_id, lecturer_id, is_valid, created_at) VALUES("'.$year.'", "'.$section.'", "'.$subjectId.'", "'.$lecturerId.'", 1, now())';
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
