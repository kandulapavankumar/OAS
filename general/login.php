<?php
include_once 'db.php';

$userName = $_POST['user_name'];
$password = $_POST['password'];

$sql = 'select id,name from students where roll_no = "'.$userName.'" AND password = "'.sha1($password).'"';
$result = mysql_query($sql);

//verify student
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_row($result)) {
        $userId = $row[0];
        $role = 'student';
        $name = $row[1];
    }
}

//verify lecturer
if(!isset($userId)) {
    $sql = 'select id,name from lecturers where email_id = "'.$userName.'" AND password = "'.sha1($password).'"';
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_row($result)) {
            $userId = $row[0];
            $role = 'lecturer';
            $name = $row[1];
        }
    }
}

//verify admin
if(!isset($userId)) {
    $sql = 'select id,name from admin where email_id = "'.$userName.'" AND password = "'.sha1($password).'"';
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_row($result)) {
            $userId = $row[0];
            $role = 'admin';
            $name = $row[1];
        }
    }
}
if(!isset($userId)){
    $form = '';
    $form = $form . '<form id="form" action="../index.php" method="post">';
    $form = $form . '<input type="hidden" value="Invalid Details." name="message">';
    $form = $form . '</form>';
    $script = '<script>document.getElementById("form").submit();</script>';
    echo $form;
    echo $script;
} else {
    session_start();
    $_SESSION['user_id'] = $userId;
    $_SESSION['role'] = $role;
    $_SESSION['name'] = $name;
    header("Location: ../" . $role . "/index.php");
}
