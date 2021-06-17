<?php
require_once "db.php";
require("fnc_ChangeStudent.php");

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$studentCount = count($_POST["firstname"]);
for($i=0;$i<$studentCount;$i++) {
    mysqli_query($conn, "UPDATE student set firstname='" . $_POST["firstname"][$i] . "', lastname='" . $_POST["lastname"][$i] . "', email='" . $_POST["email"][$i] . "' WHERE student_id='" . $_POST["student_id"][$i] . "'");
}
header("Location:Student.php");
}


?>
<html>
<head>
<title>Saada valitud tudengitele teade</title>
</head>
<body>


<?php

$rowCount = count($_POST["student"]);
for($i=0;$i<$rowCount;$i++) {
$result = mysqli_query($conn, "SELECT * FROM student WHERE student_id='" . $_POST["student"][$i] . "'");
$row[$i]= mysqli_fetch_array($result);
?>

<table>
<tr><?php echo $row[$i]['email']; ?></tr>

</table>



<?php
}
?>

</body></html>