<?php
require("db.php");
require("config.php");
/* $otsing='';
if(isset($_REQUEST["otsing"])){
    $otsing=$_REQUEST["otsing"];
} */
$select_query = "SELECT student.student_id, student.firstname, student.lastname, student.email FROM student WHERE student_id='" . $_GET["student_id"] . "'";
//$sql = "SELECT student.firstname, student.lastname, GROUP_CONCAT(CONCAT(tag.tag_color, '-', tag.tag_name)) AS TagName FROM student JOIN student_tag ON student.student_id = student_tag.student_id JOIN tag ON tag.tag_id = student_tag.tag_id GROUP BY firstname, lastname HAVING TagName like '%$otsing%'";
$sql2 = "SELECT student.student_id, student.firstname, student.lastname, GROUP_CONCAT(tag.tag_name, tag.tag_color) AS TagName FROM student JOIN student_tag ON student.student_id = student_tag.student_id JOIN tag ON tag.tag_id = student_tag.tag_id GROUP BY firstname, lastname";
$sql3 = "SELECT tag.tag_id, tag.tag_name, tag.tag_color FROM tag JOIN student_tag ON student_tag.tag_id = tag.tag_id WHERE student_tag.student_id ='" . $_GET["student_id"] . "'";
$result1 = mysqli_query($conn,$select_query);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);

/* {
echo "<tr>";
echo "<td>" . $row1['firstname'] . "</td>";
echo " ";
echo "<td>" . $row1['lastname'] . "</td>";
echo "<br>";
echo "<td>" . $row1['email'] . "</td>";
echo "</tr>";

} */

?>
<html>
<head>
<title>Kiirvaade</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmStudents" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="Student.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> Tudengid</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="listheader">
<td colspan="2">Muuda tudengit</td>
</tr>
<tr>
<td><label>Eesnimi</label></td>
<td><input type="firstname" name="firstname" class="txtField" value="<?php echo $row1['firstname']; ?>"></td>
</tr>
<td><label>Perekonnanimi</label></td>
<td><input type="text" name="lastname" class="txtField" value="<?php echo $row1['lastname']; ?>"></td>
</tr>
<td><label>Kooli email</label></td>
<td><input type="email" name="email" class="txtField" value="<?php echo $row1['email']; ?>"></td>
</tr>
</table>
<form name="frmStudents" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="Student.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> Tudengid</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="listheader">
<td>Silt</td>
<td>Värv</td>

<?php
$i=0;
while($row3 = mysqli_fetch_array($result3)) {
?>

<tr>
<td><?php echo $row3["tag_name"]; ?></td>
<td><?php echo $row3["tag_color"]; ?></td>


<?php
$i++;
    }
?>

</table>
</div>
</form>

</div>
</form>
</body></html> 
