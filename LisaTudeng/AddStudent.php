<?php

  require("fnc_AddStudent.php");
  require("config.php");

	$inputerror = "";
    $firstname = "";
    $lastname = "";
    $email = "";
    $personal_email = "";
	$studentnotice = null;
 
	$firstnameerror = null;
	$lastnameerror = null;
    $personal_emailerror = "";
    $emailerror = "";
    

	if(isset($_POST["personsubmit"])) {
		if(!empty($_POST["firstnameinput"])) {
			$firstname .= ($_POST["firstnameinput"]);
		} else {
			$firstnameerror = "Palun sisesta eesnimi!";
			
		}
		if(!empty($_POST["lastnameinput"])) {
			$lastname .= ($_POST["lastnameinput"]);
		} else {
			$lastnameerror = "Palun sisesta perekonnanimi!";
			
		}

		if(!empty($_POST["emailinput"])){
			$email .= ($_POST["emailinput"]);
		} else {
			  $emailerror = "Palun sisesta kooliemail!";
		  }

		  if(!empty($_POST["personal_emailinput"])){
			$personal_email .= ($_POST["personal_emailinput"]);
		} else {
			  $personal_emailerror = "Palun sisesta personaalne email!";
		  }
		
		if(empty($firstnameerror) and empty($lastnameerror) and empty($emailerror) and empty($personal_emailerror)) {
			$studentnotice = addstudent($firstname, $lastname, $email, $personal_email);
		}
		echo "valmis";
	}
	
	
	
?>

<head>
<link rel="stylesheet" href="style.css">
<title>Lisa tudeng</title>

</head>
 
<body>
<h3>Lisa tudeng</h3>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

 
<table align="center" cellpadding = "20">
 
<tr>
<td>Eesnimi:</td>
<td><input name="firstnameinput" id="firstnameinput" type="text" value="<?php echo $firstname; ?>"><span><?php echo $firstnameerror; ?></span>
</td>
</tr>
 
<tr>
<td>Perekonna nimi:</td>
<td><input name="lastnameinput" id="lastnameinput" type="text" value="<?php echo $lastname; ?>"><span><?php echo $lastnameerror; ?></span>
</td>
</tr>

<tr>
<td>Kooli email: </td>
<td><input name="emailinput" id="emailinput" type="email" value="<?php echo $email; ?>"><span><?php echo $emailerror; ?></span></td>
</tr>

<tr>
<td>Isiklik email: </td>
<td><input name="personal_emailinput" id="personal_emailinput" type="email" value="<?php echo $personal_email; ?>"><span><?php echo $personal_emailerror; ?></span></td>
</tr>

<tr>
<td>Lisa silt: </td>
<td><input name="courseinput" id="courseinput" type="text" value=""></td>
</tr>

<tr>
<td colspan="2" align="center">
<input name="personsubmit" type="submit" value="Salvesta">
</td>
</tr>
</table>
 
<span><?php echo $firstnameerror. " " .$lastnameerror. " ". $emailerror. " " .$personal_emailerror; ?></span>
<p><?php echo $studentnotice; ?></p>
</form>
 
</body>
</html>