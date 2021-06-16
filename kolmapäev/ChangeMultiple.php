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
<title>Lisa valitud tudengitele silt</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmStudent" method="post" action="">
<div style="width:500px;">
<div align="right" style="padding-bottom:5px;"><a href="Student.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> Tudengid</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center">
<tr class="tableheader">
</tr>


<?php
$rowCount = count($_POST["student"]);
for($i=0;$i<$rowCount;$i++) {
$result = mysqli_query($conn, "SELECT * FROM student WHERE student_id='" . $_POST["student"][$i] . "'");
$row[$i]= mysqli_fetch_array($result);
?>
<tr>
<td>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr>
<td><label>Eesnimi</label></td>
<td><input type="hidden" name="student_id[]" class="txtField" value="<?php echo $row[$i]['student_id']; ?>"><input type="text" name="firstname[]" class="txtField" value="<?php echo $row[$i]['firstname']; ?>"></td>
</tr>
<tr>
<td><label>Perenimi</label></td>
<td><input type="text" name="lastname[]" class="txtField" value="<?php echo $row[$i]['lastname']; ?>"></td>
</tr>
<td><label>E-mail</label></td>
<td><input type="text" name="email[]" class="txtField" value="<?php echo $row[$i]['email']; ?>"></td>
</tr>
</table>
</td>
</tr>


<?php
}
?>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>

</body></html>