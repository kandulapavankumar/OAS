<?php
session_start();
if(!isset($_SESSION['user_id'])){
    $form = '';
    $form = $form . '<form id="form" action="../index.php" method="post">';
    $form = $form . '<input type="hidden" value="Please Login for Access." name="message">';
    $form = $form . '</form>';
    $script = '<script>document.getElementById("form").submit();</script>';
    echo $form;
    echo $script;
}
?>