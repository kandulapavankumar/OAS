<?php
// Get Variables
$dbname = "assignment_management";
$dbusername = "root";
$dbpass = "";
$dbhost = "localhost";

$connection = mysql_connect("$dbhost","$dbusername","$dbpass");
$selected = mysql_select_db("assignment_management",$connection)
or die("Could not select examples");

$sql = "SHOW TABLES FROM `assignment_management`";
$result = mysql_query($sql);
/*if (mysql_num_rows($result) > 0) {
    echo "<pre>\n";
    while ($row = mysql_fetch_row($result)) {
        echo "{$row[0]}\n";
    }
    echo "</pre>\n";
}*/
?>