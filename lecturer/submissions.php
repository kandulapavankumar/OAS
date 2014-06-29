<?php
include 'verification.php';
include 'header.php';

if(isset($_POST['ass_id'])){
$_SESSION['ass_id'] = $_POST['ass_id'];
}
if(!isset($_SESSION['ass_id'])){

    header("Location: assignments.php");
}
$sql = 'SELECT asub.id, asub.assignment_id, asub.student_id, asub.file, asub.marks, asub.created_at, s.roll_no, s.name
FROM assignment_submissions as asub
LEFT JOIN students as s
ON asub.student_id = s.id
WHERE asub.assignment_id ="'.$_SESSION['ass_id'].'" and asub.is_valid= "1"
';
$submissions = mysql_query($sql);


?>
<link href="../css/jquery.fileupload-ui.css" rel="stylesheet">
<link href="../css/font-awesome.css" media="screen" rel="stylesheet" type="text/css">
<?php
if(isset($_POST['message'])){
    echo $_POST['message'];
}
?>
<div class="col-lg-offset-11"><a class="btn btn-default" href="assignments.php">Back</a></div>
<table class="table table-hover course-table">
    <tr>
        <th>Student Name</th>
        <th>Roll No</th>
        <th>Date Of Submission</th>
        <th>File</th>
        <th>Marks</th>
        <th></th>
    </tr>
    <?php
    if (mysql_num_rows($submissions) > 0) {
        while ($row = mysql_fetch_row($submissions)) {

            echo '<tr>';
            echo '<td>'.$row[7].'</td>';
            echo '<td>'.$row[6].'</td>';
            echo '<td>'.$row[5].'</td>';
            echo '<td><a href="'.$submittedAssignmentUploadPath.$row[3].'" download>'.$row[3].'</a></td>';
            //if($row[4] == null){
            $marks = $row[4] != null ? $row[4] : null;
            echo '<td><form class="form-submit" action="assign-marks.php" method="post"><input type="number" value="'. $marks .'" class="form-control" name="marks" style="width: 150px;"><input type="hidden" name="id" value="'.$row[0].'"></form></td>';
            echo '<td><input type="button" class="btn btn-default" onclick="submitForm(this);" value="Submit"></td>';
        //} else {
              //  echo '<td>'.$row[4].'</td>';
                //echo '<td></td>';
            //}
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="6" style="text-align: center">No Submissions</td></tr>';
    }
    ?>
</table>
<script>
    function submitForm(ele){
        $(ele).parent().parent().find('.form-submit').submit();
    }
</script>
<?php include 'footer.php'; ?>
<script src="../js/jquery.ui.widget.js"></script>
<script src="../js/jquery.fileupload-ui.js"></script>
<script src="../js/base.js"></script>