<?php
include '../general/db.php';
include '../general/verify-login.php';
include '../general/verify-role.php';
include '../general/global-const.php';
verifyRole('admin');

if(!isset($_POST['year']) || !isset($_POST['section'])){
    if(!isset($_SESSION['year']) || !isset($_SESSION['section'])){
        header("Location: index.php");
    }

}else {
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['section'] = $_POST['section'];
}
echo isset($_POST['message']) ? $_POST['message'].'<br>' : null;

$sql = 'SELECT sl.id,sl.year,sl.section,sl.subject_id, sl.lecturer_id, s.name, s.code, l.name, l.designation
FROM section_subject_lecturer as sl
LEFT JOIN subjects as s
ON sl.subject_id = s.id
LEFT JOIN lecturers as l
ON sl.lecturer_id = l.id
WHERE sl.year ="'.$_SESSION['year'].'" AND sl.section = "'.$_SESSION['section'].'"
';
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_row($result)) {
        echo $row[0].'-'.$row[1].'-'.$row[2].'-'.$row[3].'-'.$row[4].'-'.$row[5].'-'.$row[6].'-'.$row[7].'-'.$row[8].'<a href="linkup-edit.php?id='.$row[0].'">edit</a>/<a href="linkup-delete.php?id='.$row[0].'">delete</a><br>';
    }
}
?>
<form method="post" action="insert-linkup-db.php">
    <input type="hidden" value="<?php echo $_SESSION['year'] ?>" name="year">
    <input type="hidden" value="<?php echo $_SESSION['section'] ?>" name="section">

    <?php
    $sql = 'select id, name, code from subjects';
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        echo '<select name = "subject_id">';
        while ($row = mysql_fetch_row($result)) {
            echo '<option value = '.$row[0].'>'.$row[2].'-'.$row[1].'</option>';
        }
        echo '</select>';
    }

    $sql = 'select id, name, designation from lecturers';
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        echo '<select name = "lecturer_id">';
        while ($row = mysql_fetch_row($result)) {
            echo '<option value = '.$row[0].'>'.$row[1].'-'.$row[2].'</option>';
        }
        echo '</select>';
    }?>
<input type="submit" value="Submit">
    <input type=button onClick="location.href='index.php'" value='Cancel'><br>
</form>