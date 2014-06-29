<?php
include 'verification.php';

$id = $_POST['id'];
$marks = $_POST['marks'];
$form = '';
$form = $form . '<form id="form" action="submissions.php" method="post">';

if(isset($id) && isset($marks)){
    echo $sql = 'UPDATE assignment_submissions SET marks = "'.$marks.'"WHERE id = "'.$id.'"';
    $result = mysql_query($sql);
    $form = $form . '<input type="hidden" value="Marks Updated successfully." name="message">';
} else {
    $form = $form . '<input type="hidden" value="Invalid Data." name="message">';
}
$form = $form . '</form>';
$script = '<script>document.getElementById("form").submit();</script>';
echo $form;
echo $script;
?>
