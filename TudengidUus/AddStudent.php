<?php

  require("fnc_AddStudent.php");
  require("config.php");
  require("con.php");
  
  

	$inputerror = "";
    $firstname = "";
    $lastname = "";
    $email = "";
    $personal_email = "";
	$studentnotice = null;
	$uliopilaskood = null;

	$uliopilaskooderror = null;
	$firstnameerror = null;
	$lastnameerror = null;
    $personal_emailerror = "";
    $emailerror = "";

///loeb tudengi andmed vormist
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

		  if(!empty($_POST["uliopilaskoodinput"])){
			  $uliopilaskood .= ($_POST["uliopilaskoodinput"]);
		  } else {
			  $uliopilaskooderror = "Sisesta üliõpilaskood";
		  }

		if(empty($firstnameerror) and empty($lastnameerror) and empty($emailerror) and empty($personal_emailerror) and empty($uliopilaskooderror)) {
			$studentnotice = addstudent($firstname, $lastname, $email, $personal_email, $uliopilaskood);
		}
		echo "valmis";
    }
//lõpp

//// loeb failist andmed andmebaasi

if(isset($_POST["filesubmit"])){
 
 
    $filename = $_FILES["file"]["tmp_name"];


     if($_FILES["file"]["size"] > 0)
     {

         $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {

           $sql = "INSERT into student (`uliopilaskood`, `firstname`, `lastname`, `email`, `personal_email`) 
                values('$emapData[0]','$emapData[2]','$emapData[1]','$emapData[6]','$emapData[8]')";
         
          $result = mysqli_query($con, $sql);
            if(! $result )
            {
                echo "<script type=\"text/javascript\">
                        alert(\"Palun sisesta CSV fail.\");
                        window.location = \"AddStudent.php\"
                    </script>";

            }

         }
         fclose($file);

                echo "<script type=\"text/javascript\">
						alert(\"Andmed on edukalt üles laetud.\");
						window.location = \"AddStudent.php\"
					</script>";

        mysqli_close($con); 



     }
}

//////lõpp


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
<td>Lisa üliõpilaskood: </td>
<td><input name="uliopilaskoodinput" id="uliopilaskoodinput" type="text" value="<?php echo $uliopilaskood; ?>"><span><?php echo $uliopilaskooderror; ?></span></td>
</tr>

<tr>
<td colspan="2" align="center">
<input name="personsubmit" type="submit" value="Salvesta">
</td>
</tr>
</table>

<span><?php echo $firstnameerror. " " .$lastnameerror. " ". $emailerror. " " .$personal_emailerror. " " .$uliopilaskooderror; ?></span>
<p><?php echo $studentnotice; ?></p>
</form>

<div class="container">
    <h2>
        
    </h2>
    <br><br>
   

    <div class="row">
            <form enctype="multipart/form-data" method="post" action="AddStudent.php">
                <div class="form-group">
                    <label for="file">Vali fail</label>
                    <input name="file" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <?php echo $message; ?>
                </div>
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" name="filesubmit" class="btn btn-primary" value="Lae üles"/>
                    </td>
                    </tr>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html> 