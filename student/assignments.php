<?php
include 'verification.php';

if(isset($_POST['s_id']) && isset($_POST['l_id'])){
    $_SESSION['s_id'] = $_POST['s_id'];
    $_SESSION['l_id'] = $_POST['l_id'];
}
if(!isset($_SESSION['year']) || !isset($_SESSION['section']) || !isset($_SESSION['s_id']) || !isset($_SESSION['l_id'])){

    header("Location: index.php");
}
$sql = 'SELECT id,name, submission_final_date, file
FROM assignments
WHERE year ="'.$_SESSION['year'].'" AND section = "'.$_SESSION['section'].'" AND subject_id = "'.$_SESSION['s_id'].'" AND lecturer_id = "'.$_SESSION['l_id'].'" AND is_valid = "1"
';
$assignments = mysql_query($sql);
$assignmentsCopy = mysql_query($sql);
$submissions = array();
if (mysql_num_rows($assignmentsCopy) > 0) {
    while ($row = mysql_fetch_row($assignmentsCopy)) {
        $assId = $row[0];
        $sql = 'select id, file, marks from assignment_submissions where assignment_id = "'.$row[0].'" AND student_id = "'.$_SESSION['user_id'].'"  and is_valid= "1"';
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            while ($rowInner = mysql_fetch_row($result)) {
                $submissions[$row[0]]['file'] = $rowInner[1];
                $submissions[$row[0]]['marks'] = $rowInner[2];
            }

        } else {
            $submissions[$row[0]] = 0;
        }
    }
}
include 'header.php'

?>
<!-- Custom styles for this template -->
<link href="../css/home.css" rel="stylesheet">
<link href="../css/jquery.fileupload-ui.css" rel="stylesheet">
<?php
    if(isset($_POST['message'])){
    echo $_POST['message'];
}
?>
<div class="row">
    <table class="table table-hover course-table">
         <tr>
            <th width="15%">Assignment Name</th>
            <th width="20%">Questions</th>
            <th width="15%">Last Date Of Submission</th>
            <th width="20%">File</th>
            <th width="15%">marks</th>
            <th width="15%"></th>
        </tr>
        <?php
        if (mysql_num_rows($assignments) > 0) {
            while ($row = mysql_fetch_row($assignments)) {

                echo '<tr>';
                echo '<td>'.$row[1].'</td>';
                echo '<td><a href="'.$assignmentUploadPath.$row[3].'" download>'.$row[3].'</a></td>';
                echo '<td>'.$row[2].'</td>';
                if(isset($submissions[$row[0]]) && $submissions[$row[0]]){
                    $marks = '-';
                    if($submissions[$row[0]]['marks']){
                        $marks = $submissions[$row[0]]['marks'];
                    }
                    echo '<td><a href="'.$submittedAssignmentUploadPath.$submissions[$row[0]]['file'].'" download>'.$submissions[$row[0]]['file'].'</td><td>'.$marks.'</td><td>Submitted</td>';
                }else {
                    echo '<td><span class="btn btn-default fileinput-button add_attachment_btn "><span>Select file...</span><form class="file-upload" action="file-upload.php" method="post" enctype="multipart/form-data"><input id="fileupload" type="file" name="file"><input type="hidden" name="assignment_id" value="'.$row[0].'"></form></span></td>';
                    echo '<td>-</td>';
                    echo '<td><a href="#" onclick="fileUpload(this);" class="btn btn-default" >upload</a></td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="6" style="text-align: center">No Assignments</td></tr>';
        }
        ?>

    </table>
</div><!--/row-->
<script>
    function fileUpload(ele){
        $(ele).parent().parent().find('.file-upload').submit();
    }
</script>
<?php include 'footer.php' ?>

<script src="../js/home.js"></script>
<script src="../js/jquery.ui.widget.js"></script>
<script src="../js/jquery.fileupload-ui.js"></script>
