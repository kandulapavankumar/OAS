<?php
include '../general/db.php';
include '../general/verify-login.php';
include '../general/verify-role.php';
include '../general/global-const.php';
verifyRole('admin');

$id = $_GET['id'];

if($id){
    $sql = 'DELETE from section_subject_lecturer WHERE id = "'.$id.'"';
    $result = mysql_query($sql);
    $message = 'Deleted Successfully';
} else {
    $message = 'Invalid parameters';
}
?>
<form id="form" action="subjects-linkup.php" method="post">
    <input type="hidden" value="<?php echo $message ?>" name="message">
</form>
<script>document.getElementById("form").submit();</script>
