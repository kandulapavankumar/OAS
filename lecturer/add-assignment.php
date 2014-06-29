<?php
include 'verification.php';
include 'header.php';
?>
<link href="../css/jquery.fileupload-ui.css" rel="stylesheet">
<link href="../css/datetimepicker.css" media="screen" rel="stylesheet" type="text/css">
<link href="../css/font-awesome.css" media="screen" rel="stylesheet" type="text/css">


<div class="col-lg-offset-5">
    <h3>New Assignment</h3>
</div>
<div class="col-lg-offset-4 col-md-4">
    <form role="form" action="file-upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleAssignmentName">Assignment Name</label>
            <input type="text" class="form-control" id="assignment-name" name="assignment-name" placeholder="Enter Assignment Name" required>
        </div>
        <div class="form-group" >
            <label for="exampleAssignmentName">Last Submission Date</label>
            <div class="input-control" style="position: relative">
                <input type="text"
                       class="form-control"
                       id="start-date"
                       name="period_start" placeholder="Submission Date" required>
                <span id="start-date-cal" class="cal glyphicon glyphicon-calendar" style="position: absolute; font-size: 25px;color: grey;margin-top: 3px;margin-left: 300px" type="button"></span>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleQuestions">Questions File</label>
            <span class="btn btn-default fileinput-button add_attachment_btn ">
                <span>Select file...</span>
                <input id="fileupload" type="file" name="file" required>

            </span>
            <ul id="selected-files">
                            <!--File names will be displayed here-->
                </ul>

                <div id="progress" style="width: 250px">
                    <div class="bar" style="width: 0%;"></div>
                </div>

        </div
         <div class="form-group" >
             <input type="reset" class="form-control reset-btn" >
             <a class="back-anc" href="assignments.php"><input type="button" class="form-control back-btn" value="Back"></a>
             <input type="submit" class="form-control submit-btn" >

         </div>
        </div>

</div>


</form>
<script src="../js/jquery.ui.widget.js"></script>
<script src="../js/jquery.fileupload-ui.js"></script>
<script src="../js/base.js"></script>
<script src="../js/bootstrap-datetimepicker.js"></script>

<link href="../css/datepicker.css" rel="stylesheet">
<script src="../js/bootstrap-datepicker.js"></script>
<!--<script src="../js/datepicker.less"></script> -->
<?php
include 'footer.php';
?>

<script>
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    arrivalPicker = $('#start-date').datepicker({
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        arrivalPicker.hide();
    }).data('datepicker');
    $("#start-date-cal").click(function() {
        arrivalPicker.show();
    });

</script>