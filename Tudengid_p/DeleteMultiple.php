<?php
require_once "db.php";
$database = "if20_pille_suvepraktika";
require("config.php");
print_r($_POST["student"]);
$rowCount = count($_POST["student"]);
for($i=0;$i<$rowCount;$i++) {
mysqli_query($conn, "DELETE FROM student WHERE student_id='" . $_POST["student"][$i] . "'");
}
header("Location:Student.php");
?>