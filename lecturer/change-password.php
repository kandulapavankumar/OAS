<?php
include 'verification.php';
include 'header.php';
?>
<div class="col-lg-offset-5">
    <h3>Change Password</h3>
</div>
<div class="col-lg-offset-4 col-md-4">
    <form role="form" action="save-password.php" method="post">
        <div class="form-group">
            <label>Old Password</label>
            <input type="password" class="form-control" name="old-password" placeholder="Enter Old Password" required>
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" class="form-control" name="new-password" placeholder="Enter New Password" required>
        </div>
        <div class="form-group">
            <label>Retype Password</label>
            <input type="password" class="form-control" name="retype-password" placeholder="Retype Password" required>
        </div>
        <div>
            <?php
            if(isset($_POST['message'])){
                print_r( $_POST['message']);
            }
            ?>
        </div>
         <div class="form-group" >
             <input type="reset" class="form-control reset-btn" >
             <a class="back-anc" href="index.php"><input type="button" class="form-control back-btn" value="Back"></a>
             <input type="submit" class="form-control submit-btn" >
         </div>
</div>


</form>
<?php
include 'footer.php';
?>