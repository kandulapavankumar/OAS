<?php
include '../general/db.php';
include '../general/verify-login.php';
include '../general/verify-role.php';
include '../general/global-const.php';
include '../general/upload-handler.php';
verifyRole('student');
$assignmentId = $_POST['assignment_id'];

$form = '';
$form = $form . '<form id="form" action="index.php" method="post">';

if(isset($_FILES['file']) && isset($assignmentId)){
    $file = $_FILES['file'];
    $fileData = uploadFile($file,$submittedAssignmentUploadPath, array('pdf'), 0);
    if($fileData['success']){
        $sql = 'INSERT INTO assignment_submissions(assignment_id, student_id, file, created_at) VALUES("'.$assignmentId.'", "'.$_SESSION['user_id'].'", "'.$fileData['file_name'].'",  now())';
        $result = mysql_query($sql);
        $form = $form . '<input type="hidden" value="Assignment submitted successfully." name="message">';
    }  else {
        $form = $form . '<input type="hidden" value="Invalid File." name="message">';
    }
}  else {
    $form = $form . '<input type="hidden" value="Invalid Data." name="message">';
}
$form = $form . '</form>';
$script = '<script>document.getElementById("form").submit();</script>';
echo $form;
echo $script;

?>
