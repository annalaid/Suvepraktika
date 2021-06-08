<?php
$database = "if20_pille_suvepraktika";

function printstudents(){
	$notice = "<p>Kahjuks tudengeid ei leitud!</p> \n";
	$conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
	$SQLsentence = "SELECT firstname, lastname, uliopilaskood FROM student";

    $stmt = $conn->prepare($SQLsentence);

	$stmt->bind_result($firstnamefromdb, $lastnamefromdb, $uliopilaskoodfromdb);
	$stmt->execute();
	$lines = "";

	while($stmt->fetch()){
		$lines .= "<tr>\n<td>\n" .$uliopilaskoodfromdb ."</td>\n";
        $lines .= "<td>" .$firstnamefromdb ."</td>\n";
        $lines .= "<td>" .$lastnamefromdb ."</td>\n";
          
	}
	if(!empty($lines)){
		$notice = "<table>\n<tr>\n" .'<th>Üliõpilaskood &nbsp;</th>';
        $notice .= "\n" .'<th>Eesnimi &nbsp;</th>';
		$notice .= "\n" .'<th>Perekonnanimi &nbsp;</th>';
        $notice .=  "\n" .'<th>Tegevus &nbsp;</th>' 
		$notice .= "</tr>\n" .$lines ."</table>\n";
		
	}
	//&nbsp; on tühik (nonbreakablespace)
	$stmt->close();
	$conn->close();
	return $notice;
}