<?php
include 'verification.php';

$sql = 'UPDATE section_subject_lecturer SET is_valid = "0"';
$result = mysql_query($sql);

$sql = 'UPDATE assignments SET is_valid = "0"';
$result = mysql_query($sql);

$sql = 'UPDATE assignment_submissions SET is_valid = "0"';
$result = mysql_query($sql);

$message = 'Updated Successfully';
?>

<form id="form" action="index.php" method="post">
    <input type="hidden" value="<?php echo $message ?>" name="message">
</form>
<script>document.getElementById("form").submit();</script>
