<?php
include 'verification.php';
include 'header.php';

if(isset($_POST['message'])){
    print_r( $_POST['message']);
}
?>
    <link href="../css/jquery.fileupload-ui.css" rel="stylesheet">
    <link href="../css/datetimepicker.css" media="screen" rel="stylesheet" type="text/css">
    <link href="../css/font-awesome.css" media="screen" rel="stylesheet" type="text/css">

<div>
     <table class="table table-hover course-table">
         <tr>
             <td>students list</td>
             <td>
                 <form action="file-upload.php" method="post" enctype="multipart/form-data">
                    <span class="btn btn-default fileinput-button add_attachment_btn ">
                        <span>Select file...</span>
                        <input id="fileupload" type="file" name="students" >
                    </span>
                    <input type="submit" class="btn btn-primary">
                 </form>
             </td>
         </tr>
         <tr>
             <td>Lecturers list</td>
             <td>
                 <form action="file-upload.php" method="post" enctype="multipart/form-data">
                    <span class="btn btn-default fileinput-button add_attachment_btn ">
                        <span>Select file...</span>
                        <input id="fileupload" type="file" name="lecturers" >
                    </span>
                    <input type="submit" class="btn btn-primary">
                 </form>
             </td>
         </tr>
         <tr>
             <td>Subject list</td>
             <td>
                 <form action="file-upload.php" method="post" enctype="multipart/form-data">
                    <span class="btn btn-default fileinput-button add_attachment_btn ">
                        <span>Select file...</span>
                        <input id="fileupload" type="file" name="subjects" >
                    </span>
                    <input type="submit" class="btn btn-primary">
                 </form>
             </td>
         </tr>
     </table>
</div><!--/row-->
<?php include 'footer.php'; ?>