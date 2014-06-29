<?php
include 'verification.php';
include 'insert-to-db.php';

if(isset($_FILES['students'])){
    $file = $_FILES['students'];
    $fileData = uploadFile($file,$studentsUploadPath, array('csv'), $studentsFileFields);
    if($fileData['success']){
        insertStudents($fileData['file_name'], $studentsUploadPath);
        $msg = 'Students added successfully.';
    } else {
        $msg = $fileData['errors'];
    }
} else if(isset($_FILES['lecturers'])) {
    $file = $_FILES['lecturers'];
    $fileData = uploadFile($file,$lecturesUploadPath, array('csv'), $lecturersFileFields);
    if($fileData['success']){
        insertLectuers($fileData['file_name'], $lecturesUploadPath);
        $msg = 'Lecturers added successfully.';
    } else {
        $msg = $fileData['errors'];
    }
} else if(isset($_FILES['subjects'])) {
    $file = $_FILES['subjects'];
    $fileData = uploadFile($file,$subjectsUploadPath, array('csv'), $subjectsFileFields);
    if($fileData['success']){
        insertSubjects($fileData['file_name'], $subjectsUploadPath);
        $msg = 'Subjects added successfully.';
    } else {
        $msg = $fileData['errors'];
    }
}
$message = $msg ? $msg : 'invalid details';
?>

<form id="form" action="uploaddata.php" method="post">
    <input type="hidden" value="<?php echo $message ?>" name="message">
</form>
<script>document.getElementById("form").submit();</script>
