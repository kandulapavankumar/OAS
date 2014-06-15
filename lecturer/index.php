<?php
include '../general/verify-login.php';
include '../general/verify-role.php';
verifyRole('lecturer');
?>
<input type=button onClick="location.href='../general/logout.php'" value='logout'><br>
<h2>Welcome Lecturer</h2>