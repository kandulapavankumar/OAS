<?php
include 'verify-login.php';
session_destroy();
?>
<form id="form" action="../index.php" method="post">
    <input type="hidden" value="Logged Out Successfully." name="message">
</form>
<script>
    document.getElementById('form').submit();
</script>