<?php
include 'verification.php';

$assignmentId = $_POST['assignment_id'];

$form = '';
$form = $form . '<form id="form" action="assignments.php" method="post">';

if(isset($_FILES['file']) && isset($assignmentId)){
    $file = $_FILES['file'];
    $fileData = uploadFile($file,$submittedAssignmentUploadPath, array('pdf'), 0);
    if($fileData['success']){
        $sql = 'INSERT INTO assignment_submissions(assignment_id, student_id, file, marks, is_valid, created_at) VALUES("'.$assignmentId.'", "'.$_SESSION['user_id'].'", "'.$fileData['file_name'].'", null, 1,  now())';
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
