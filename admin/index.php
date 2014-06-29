<?php
include 'verification.php';
include 'header.php';

if(isset($_POST['message'])){
    print_r( $_POST['message']);
}
?>
<div class="">
    <a href="uploaddata.php" type="button"  class="btn bg-primary">Upload Profile data</a>
    <a style="float: right"  type="button" class="btn bg-danger" href="#" onclick="movetonextsem()">Move to Next semester </a>
</div><!--/row-->

<div style="display: block">
    <h4>Select Year and section to add Subjects</h4>
    <form class="form-inline" role="form" method="post" action="subjects-linkup.php">
        <div class="form-group">
            <label for="exampleInputYear">Year</label>
            <select class="form-control" name="year">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>


        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Section</label>
            <select class="form-control"  name="section">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
                <option value="J">J</option>
            </select>

        </div>
        <input type="submit" class="btn btn-default" value="Go...">
    </form>
</div><!--/row-->

<?php include 'footer.php'; ?>


<script src="../js/bootbox.js"></script>
<script>
function movetonextsem()
{
    bootbox.dialog({
        message: "Are You sure you want to move next semester",
        title: "Move to Next sem",
        buttons: {
            success: {
                label: "Cancel!",
                className: "btn-success",
                callback: function() {
                    close();
                }
            },
            danger: {
                label: "Move!",
                className: "btn-danger",
                callback: function() {
                    invalidateDetails();
                }
            }
        }
    });
}
function invalidateDetails(){
    window.location.href = "invalidate-data.php";
}
</script>
