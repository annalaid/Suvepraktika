
<?php


require_once "db.php";
require("config.php");
$sql = "SELECT student_id, firstname, lastname, uliopilaskood, email FROM student ORDER BY student_id DESC";
$result = mysqli_query($conn,$sql);


?>
<html>
<head>
<title>Tudengid</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script language="javascript" src="Student.js" type="text/javascript"></script>
</head>

<body>
<form name="frmStudents" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="AddStudent.php" class="link"><img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> Lisa tudeng</a></div>
<table border="0" cellpadding="10" cellspacing="1" width="500" class="tblListForm">
<tr class="listheader">
<td>Vali</td>
<td>Üliopilaskood</td>
<td>Eesnimi</td>
<td>Perekonnanimi</td>
<td>Tegevused</td>
<td></td>
<td></td>

<td></td>

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
<td><input type="checkbox" name="student[]" value="<?php echo $row["student_id"]; ?>" ></td>
<td><?php echo $row["uliopilaskood"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["lastname"]; ?></td>
<td><a href="ChangeStudent.php?student_id=<?php echo $row["student_id"]; ?>" class="link"><img alt='Edit' title='Muuda' src='images/edit.png' width='15px' height='15px' hspace='10' /></a>
<td><a href="GetStudent.php?student_id=<?php echo $row["student_id"]; ?>" class="link"><img alt='View' title='Kiirvaade' src='images/View.png' width='15px' height='15px' hspace='10' /> </a>
<td><a href="mailto:<?php echo $row["email"]; ?>" class="link"><img alt='Message' title='Teade' src='images/Message.png' width='15px' height='15px' hspace='10' /> </a>
<td><a href="DeleteStudent.php?student_id=<?php echo $row["student_id"]; ?>"  class="link"><img alt='Delete' title='Kustuta' src='images/delete.png' width='15px' height='15px'hspace='10' /></a></td>
</tr>



<?php
if (isset($_POST['send_message_btn'])) {
	$name = $_POST['name'];
	$email = $row['email'];
	$subject = $_POST['subject'];
	$msg = $_POST['msg'];
   
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$message = "<html>
	<head>
		<title>New message from website contact form</title>
	</head>
	<body>
		<h1>" . $subject . "</h1>
		<p>".$msg."</p>
	</body>
	</html>";
	if (mail('website_owner@example.com', $subject, $message, $headers)) {
	 echo "Email sent";
	}else{
	 echo "Failed to send email. Please try again later";
	}
  }


$i++;
}
?>
<tr class="listheader">
<td colspan="8"><input type="button" name="teade" value="Saada teade" onClick="settulebfunktsioon();" /> <input type="button" name="delete" value="Kustuta valitud"  onClick="setDeleteAction();" /></td>


</tr>
</table>
</form>
</div>
</body></html> 