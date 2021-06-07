<?php
  require("config.php");
  require("fnc_studentoutput.php");
  
  $sortby = 0;
  $sortorder = 0;

?>
<head>
<link rel="stylesheet" href="style.css">
<title>Tudeng</title>
</head>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table align="center" cellpadding = "20">

<tr>
    <td>
  <hr>
  <?php
	if(isset($_GET["sortby"]) and isset($_GET["sortorder"])){
		if(($_GET["sortby"] >= 1 and $_GET["sortby"] <= 4)){
			$sortby = $_GET["sortby"];
		}
	
	if(($_GET["sortorder"] == 1 or $_GET["sortorder"] == 2)){
			$sortorder = $_GET["sortorder"];
		}
	}
  echo readstudents($sortby, $sortorder); 
  ?>
    </td>
</tr>

<tr>
<td colspan="2" align="center">
</td>
</tr>
</table>
</body>
</html>