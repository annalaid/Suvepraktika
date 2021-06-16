<?php
$database = "if20_pille_suvepraktika";
require("db.php");
require("config.php");
$sql = "DELETE FROM student WHERE student_id='" . $_GET["student_id"] . "'";
mysqli_query($conn,$sql);
header("Location:Student.php");
?>