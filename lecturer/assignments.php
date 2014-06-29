<?php
include 'verification.php';
include 'header.php';

if(isset($_POST['year']) && isset($_POST['section']) && isset($_POST['s_id'])){
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['section'] = $_POST['section'];
    $_SESSION['s_id'] = $_POST['s_id'];
}
if(!isset($_SESSION['year']) || !isset($_SESSION['section']) || !isset($_SESSION['s_id'])){

    header("Location: index.php");
}
$sql = 'SELECT id,name, submission_final_date, file
FROM assignments
WHERE year ="'.$_SESSION['year'].'" AND section = "'.$_SESSION['section'].'" AND subject_id = "'.$_SESSION['s_id'].'" AND lecturer_id = "'.$_SESSION['user_id'].'"
';
$assignments = mysql_query($sql);


?>
<link href="../css/jquery.fileupload-ui.css" rel="stylesheet">
<link href="../css/font-awesome.css" media="screen" rel="stylesheet" type="text/css">
<?php
if(isset($_POST['message'])){
    echo $_POST['message'];
}
?>

<div class="col-lg-offset-11"><a class="btn btn-primary" href="add-assignment.php">+ Assignment</a></div>
<table class="table table-hover course-table">
    <tr>
        <th>Assignment Name</th>
        <th>Last Date Of Submission</th>
        <th>Questions File</th>
        <th>Submissions</th>
    </tr>
    <?php
    if (mysql_num_rows($assignments) > 0) {
        while ($row = mysql_fetch_row($assignments)) {

            echo '<tr>';
            echo '<td>'.$row[1].'</td>';
            echo '<td>'.$row[2].'</td>';
            echo '<td><a href="'.$assignmentUploadPath.$row[3].'" download>'.$row[3].'</a></td>';
            echo '<td><form action="submissions.php" method="post"><input type="hidden" name="ass_id" value="'.$row[0].'"><input type="submit" class="btn btn-default" value="View Submission"></form></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="4" style="text-align: center">No Assignments</td></tr>';
    }
    ?>
</table>
<?php include 'footer.php'; ?>
<script src="../js/jquery.ui.widget.js"></script>
<script src="../js/jquery.fileupload-ui.js"></script>
<script src="../js/base.js"></script>