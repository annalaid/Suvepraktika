<?php

$database = "if20_pille_suvepraktika";
require("db.php");
require("config.php");
$sql = "SELECT firstname, lastname, uliopilaskood FROM student ORDER BY student_id DESC";
$result = mysqli_query($conn,$sql);

?>
<html>
<head>
<title>Tudengid</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
<form name="frmStudents" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="AddStudent.php" class="link"><img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> Lisa tudeng</a></div>
<table border="0" cellpadding="10" cellspacing="1" width="500" class="tblListForm">
<tr class="listheader">
<td>Üliopilaskood</td>
<td>Eesnimi</td>
<td>Perekonnanimi</td>
<td>Tegevused</td>
</tr>

<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>

<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["uliopilaskood"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["lastname"]; ?></td>
<td><a href="ChangeStudent.php?student_id=<?php echo $row["student_id"]; ?>" class="link"><img alt='Edit' title='Muuda' src='images/edit.png' width='15px' height='15px' hspace='10' /></a>  <a href="DeleteStudent.php?student_id=<?php echo $row["student_id"]; ?>"  class="link"><img alt='Delete' title='Kustuta' src='images/delete.png' width='15px' height='15px'hspace='10' /></a></td>
</tr>

<?php
$i++;
}
?>

</table>
</form>
</div>
</body></html>