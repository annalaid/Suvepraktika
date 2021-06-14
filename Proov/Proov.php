<?php


require("fnc_addTag.php");
require("config.php");
require_once "db.php";

$sql = "SELECT tag_id, tag_name, tag_color FROM tag";
$result = mysqli_query($conn, $sql);

  $tag_name = "";
  $tagnotice = null;
  $tag_nameerror = null;
  $tag_color = null;
  $tag_colorerror = null;

  if(isset($_POST["personsubmit"])) {
		if(!empty($_POST["tag_nameinput"])) {
			$tag_name .= ($_POST["tag_nameinput"]);
		}
    else {
			$tag_nameerror = "Palun sisesta silt";
      }

    if(!empty($_POST["tag_colorinput"])) {
      $tag_color .= ($_POST["tag_colorinput"]);
    }
    else {
      $tag_colorerror .= ($_POST["tag_colorinput"]);
    }

    if(empty($tag_nameerror) and empty($tag_colorerror)){
      $tagnotice = addTag($tag_name, $tag_color);
      
    }
			
	}


?>

<!-- <td><a href="DeleteStudent.php?student_id=<?php // echo $row["student_id"]; ?>"  class="link"><img alt='Delete' title='Kustuta' src='images/delete.png' width='15px' height='15px'hspace='10' /></a></td> -->
<html>
<head>
<title>Sildid</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

 
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<td>Lisa silt: </td>
<tr><td><input name="tag_nameinput" id="tag_nameinput" type="text" value="<?php echo $tag_name; ?>"><span><?php echo $tag_nameerror; ?></span></td></tr>
<td>Lisa värv: </td>
<tr><td><input type="color" name="tag_colorinput" id="tag_colorinput" value="<?php echo $tag_color; ?>"><span><?php echo $tag_colorerror; ?></span></td></tr>
<tr><td><input name="personsubmit" type="submit" value="Salvesta"></td></tr>
<span><?php echo $tag_nameerror ?></span>
<span><?php echo $tag_colorerror; ?></span>
<p><?php echo $tagnotice; ?></p>



<form name="Label" method="post" action="">
<div style="width:500px;">
<table border="0" cellpadding="10" cellspacing="1" width="500" class="tblListForm">
<tr class="listheader">
<td>Kuvatud sildid</td>
<td>Värv</td>
<td>Kustuta</td>

<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="evenRow";
else
$classname="oddRow";
?>

<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["tag_name"]; ?></td>
<td><?php echo $row["tag_color"]; ?></td>
<td><a href="DeleteTag.php?tag_id=<?php echo $row["tag_id"]; ?>"  class="link"><img alt='Delete' title='Kustuta' src='images/delete.png' width='15px' height='15px'hspace='10' /></a></td>
</tr>

<?php
$i++;
}
?>

</table>
</form>
</div>
</body>
</html>