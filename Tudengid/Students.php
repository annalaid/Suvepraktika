<?php
  require("config.php");
  require("fnc_Student.php");
  

?>
<head>
<link rel="stylesheet" href="style.css">
<title>Tudeng</title>
</head>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table align="center" cellpadding = "20">

<hr>

<div id="students">
    <h2>Tudengid</h2>
    <?php 
     
      echo printstudents(); 
    ?>
  </div>

<tr>
<td colspan="2" align="center">
</td>
</tr>
</table>
</body>
</html>