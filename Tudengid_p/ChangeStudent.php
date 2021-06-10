<?php


require("db.php");
require("config.php");
if(count($_POST)>0) {
	$sql = "UPDATE student set uliopilaskood='" . $_POST["uliopilaskood"] . "', firstname='" . $_POST["firstname"] . "', lastname='" . $_POST["lastname"] . "', email='" . $_POST["email"] . "', personal_email='" . $_POST["personal_email"] . "' WHERE student_id='" . $_POST["student_id"] . "'";
	mysqli_query($conn,$sql);
	$message = "Edukalt muudetud!";
}
$select_query = "SELECT * FROM student WHERE student_id='" . $_GET["student_id"] . "'";
$result = mysqli_query($conn,$select_query);
$row = mysqli_fetch_array($result);
?>

<html>
<head>
<title>Lisa uus tudeng</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmStudents" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="Student.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> Tudengid</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Muuda tudengit</td>
</tr>
<tr>
<td><label>Uliopilaskood</label></td>
<td><input type="hidden" name="student_id" class="txtField" value="<?php echo $row['student_id']; ?>"><input type="text" name="uliopilaskood" class="txtField" value="<?php echo $row['uliopilaskood']; ?>"></td>
</tr>
<tr>
<td><label>Eesnimi</label></td>
<td><input type="firstname" name="firstname" class="txtField" value="<?php echo $row['firstname']; ?>"></td>
</tr>
<td><label>Perekonnanimi</label></td>
<td><input type="text" name="lastname" class="txtField" value="<?php echo $row['lastname']; ?>"></td>
</tr>
<td><label>Kooli email</label></td>
<td><input type="email" name="email" class="txtField" value="<?php echo $row['email']; ?>"></td>
</tr>
<td><label>Isiklik email</label></td>
<td><input type="email" name="personal_email" class="txtField" value="<?php echo $row['personal_email']; ?>"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Salvesta" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html> 
