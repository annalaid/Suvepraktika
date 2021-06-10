<?php
require_once "db.php";

$rowCount = count($_POST["student"]);
for($i=0;$i<$rowCount;$i++) {
mysqli_query($conn, "DELETE FROM student WHERE student_id='" . $_POST["student_id "][$i] . "'");
}
header("Location:Student.php");
?>