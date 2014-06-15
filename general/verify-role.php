<?php
    function verifyRole($role){
        if(isset($_SESSION['role']) && $_SESSION['role'] == $role){
            return true;
        } else {
            header("Location: ../" . $_SESSION['role'] . "/index.php");
        }
    }
?>