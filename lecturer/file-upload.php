<?php
include 'verification.php';
print_r($_POST);

$name = $_POST['assignment-name'];
$subjectId = $_SESSION['s_id'];
$lecturerId = $_SESSION['user_id'];
$year = $_SESSION['year'];
$section = $_SESSION['section'];
$finalDate = $_POST['period_start'];
$timestamp = strtotime($finalDate);
$finalDate = date('Y-m-d', $timestamp);
$form = '';
$form = $form . '<form id="form" action="assignments.php" method="post">';

if(isset($_FILES['file']) && isset($name) && isset($subjectId) && isset($lecturerId) && isset($year) && $section){
    $file = $_FILES['file'];
    $fileData = uploadFile($file,$assignmentUploadPath, array('pdf'), 0);
    if($fileData['success']){
        echo $sql = 'INSERT INTO assignments(name, subject_id, lecturer_id, year, section, submission_final_date, file, is_valid, created_at) VALUES("'.$name.'", "'.$subjectId.'", "'.$lecturerId.'", "'.$year.'", "'.$section.'", "'.$finalDate.'", "'.$fileData['file_name'].'", 1,  now())';
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
