<?php
include '../general/db.php';
include '../general/verify-login.php';
include '../general/verify-role.php';
include '../general/global-const.php';
include '../general/upload-handler.php';
include 'insert-to-db.php';
verifyRole('admin');
if(isset($_FILES['students'])){
    $file = $_FILES['students'];
    $fileData = uploadFile($file,$studentsUploadPath, array('csv'), $studentsFileFields);
    if($fileData['success']){
        insertStudents($fileData['file_name'], $studentsUploadPath);
    }
} else if(isset($_FILES['lecturers'])) {
    $file = $_FILES['lecturers'];
    $fileData = uploadFile($file,$lecturesUploadPath, array('csv'), $lecturersFileFields);
    if($fileData['success']){
        insertLectuers($fileData['file_name'], $lecturesUploadPath);
    }
} else if(isset($_FILES['subjects'])) {
    $file = $_FILES['subjects'];
    $fileData = uploadFile($file,$subjectsUploadPath, array('csv'), $subjectsFileFields);
    if($fileData['success']){
        insertSubjects($fileData['file_name'], $subjectsUploadPath);
    }
}
?>
