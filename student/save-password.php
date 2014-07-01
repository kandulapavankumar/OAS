<?php
include 'verification.php';

$oldPassword = $_POST['old-password'];
$newPassword = $_POST['new-password'];
$retypePassword = $_POST['retype-password'];
if($newPassword == $retypePassword){
    $sql = 'select password from students where id = "'.$_SESSION['user_id'].'"';
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_row($result)) {
            $password = $row[0];
            if($password == sha1($oldPassword)){
                $sql = 'UPDATE students SET password = "'. sha1($newPassword) .'" where id = "'. $_SESSION['user_id'] .'"';
                $result = mysql_query($sql);
                $msg = 'Password Updated Successfully';
            } else {
                $msg = 'Invalid Password';
            }
        }
    }
} else {
    $msg = 'Invalid Retype Password';
}
?>
<form id="form" action="change-password.php" method="post">
    <input type="hidden" value="<?php echo $msg ?>" name="message">
</form>
<script>document.getElementById("form").submit();</script>
