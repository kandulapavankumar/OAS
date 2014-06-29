<?php
include 'verification.php';
include 'header.php';
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
WHERE sl.year ="'.$_SESSION['year'].'" AND sl.section = "'.$_SESSION['section'].'" AND sl.is_valid = "1"
';
$subjects = mysql_query($sql);
?>
<div style="margin-bottom: 20px;">
    <h4>Select Subject and Lecture to add Subjects</h4>
    <form class="form-inline" role="form" method="post" action="insert-linkup-db.php" >
        <input type="hidden" value="<?php echo $_SESSION['year'] ?>" name="year">
        <input type="hidden" value="<?php echo $_SESSION['section'] ?>" name="section">
        <div class="form-group">
            <label for="exampleInputYear">Subject</label>
        <?php
        $sql = 'select id, name, code from subjects';
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            echo '<select name = "subject_id" class="form-control">';
            while ($row = mysql_fetch_row($result)) {
                echo '<option value = '.$row[0].'>'.$row[2].'-'.$row[1].'</option>';
            }
            echo '</select>';
        }?>
        </div>
        <div class="form-group">
            <label for="exampleInputLecture">Lecture</label>
        <?php
        $sql = 'select id, name, designation from lecturers';
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            echo '<select name = "lecturer_id" class="form-control">';
            while ($row = mysql_fetch_row($result)) {
                echo '<option value = '.$row[0].'>'.$row[1].'-'.$row[2].'</option>';
            }
            echo '</select>';
        }?>
        </div>
        <input type="submit" value="Add" class="btn btn-default">
        <input type=button class="btn btn-default" onClick="location.href='index.php'" value='Back'><br>
    </form>
</div>

    <table class="table table-hover course-table">
        <tr>
            <th>Subject Code</th>
            <th>Suject Name</th>
            <th>Lecture</th>
            <th>Actions</th>
        </tr>
<?php
if (mysql_num_rows($subjects) > 0) {
    while ($row = mysql_fetch_row($subjects)) {
        echo '<tr>';
        echo '<td>' . $row[6] . '</td>';
        echo '<td>' . $row[5] . '</td>';
        echo '<td>' . $row[7] . '</td>';
        echo '<td>' . '<a style="margin-right: 5px;" href="linkup-edit.php?id='.$row[0].'" class="btn btn-default" >Edit</a><a href="linkup-delete.php?id='.$row[0].'" class="btn btn-default" >Delete</a>' . '</td>';
        //echo $row[0].'-'.$row[1].'-'.$row[2].'-'.$row[3].'-'.$row[4].'-'.$row[5].'-'.$row[6].'-'.$row[7].'-'.$row[8].'<a href="linkup-edit.php?id='.$row[0].'">edit</a>/<a href="linkup-delete.php?id='.$row[0].'">delete</a><br>';
        echo '</tr>';
    }
}
?>
</table>
<?php include 'footer.php'; ?>