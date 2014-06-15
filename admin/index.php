<?php
include '../general/verify-login.php';
include '../general/verify-role.php';
verifyRole('admin');
?>
<input type=button onClick="location.href='../general/logout.php'" value='logout'><br>
<h2>Welcome Admin</h2>
<form action="file-upload.php" method="post" enctype="multipart/form-data">
    <label>students list</label>
    <input type="file" name="students">
    <input type="submit">
</form>

<form action="file-upload.php" method="post" enctype="multipart/form-data">
    <label>Lecturers list</label>
    <input type="file" name="lecturers">
    <input type="submit">
</form>

<form action="file-upload.php" method="post" enctype="multipart/form-data">
    <label>Subject list</label>
    <input type="file" name="subjects">
    <input type="submit">
</form>

<form action="subjects-linkup.php" method="post">
    <label>Select Year</label>
    <select name="year">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>

    <label>Select Section</label>
    <select name="section">
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
    <input type="submit" value="Submit">
</form>
