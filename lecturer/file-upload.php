<?php
include '../general/db.php';
include '../general/verify-login.php';
include '../general/verify-role.php';
include '../general/global-const.php';
include '../general/upload-handler.php';
verifyRole('lecturer');
$name = $_POST['name'];
$subjectId = $_POST['subject_id'];
$lecturerId = $_SESSION['user_id'];
$year = $_POST['year'];
$section = $_POST['section'];
$finalDate = $_POST['final_date'];

$form = '';
$form = $form . '<form id="form" action="index.php" method="post">';

if(isset($_FILES['file']) && isset($name) && isset($subjectId) && isset($lecturerId) && isset($year) && $section){
    $file = $_FILES['file'];
    $fileData = uploadFile($file,$assignmentUploadPath, array('pdf'), 0);
    if($fileData['success']){
        $sql = 'INSERT INTO assignments(name, subject_id, lecturer_id, year, section, submission_final_date, file, created_at) VALUES("'.$name.'", "'.$subjectId.'", "'.$lecturerId.'", "'.$year.'", "'.$section.'", "'.'", "'.$final_date.'", "'.$fileData['file_name'].'",  now())';
        $result = mysql_query($sql);
        $form = $form . '<input type="hidden" value="Assignment added successfully." name="message">';
    } else {
        $form = $form . '<input type="hidden" value="Invalid File." name="message">';
    }
} else {
    $form = $form . '<input type="hidden" value="Invalid Data." name="message">';
}
$form = $form . '</form>';
$script = '<script>document.getElementById("form").submit();</script>';
echo $form;
echo $script;
?>
