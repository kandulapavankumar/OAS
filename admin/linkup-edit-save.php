<?php
include '../general/db.php';
include '../general/verify-login.php';
include '../general/verify-role.php';
include '../general/global-const.php';
verifyRole('admin');

if(isset($_POST['id']) && isset($_POST['subject_id']) && isset($_POST['lecturer_id'])){
    $sql = 'UPDATE section_subject_lecturer SET subject_id = "'.$_POST['subject_id'].'", lecturer_id = "'.$_POST['lecturer_id'].'" WHERE id = "'.$_POST['id'].'"';
    $result = mysql_query($sql);
    $message = 'Updated Successfully';
} else {
    $message = 'invalid parameters';
}
?>

<form id="form" action="subjects-linkup.php" method="post">
    <input type="hidden" value="<?php echo $message ?>" name="message">
</form>
<script>document.getElementById("form").submit();</script>
