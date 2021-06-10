<?php

require_once "db.php";

//kustuta tudeng
$sql = "DELETE FROM student WHERE student_id='" . $_GET["student_id"] . "'";
mysqli_query($conn,$sql);
header("Location:Student.php");

?> 