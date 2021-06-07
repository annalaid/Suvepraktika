<?php
$database = "if20_pille_suvepraktika";

function readstudents($sortby, $sortorder){
	$notice = "<p>Kahjuks tudengeid ei leitud!</p> \n";
	$conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
	
	if($sortby == 0 and $sortorder == 0){
		$stmt = $conn->prepare("SELECT firstname, lastname, personal_email, email FROM student ");
	}
	if($sortby == 4){
		if($sortorder == 1){
			$stmt = $conn->prepare("SELECT firstname, lastname, personal_email, email FROM student ");
		} else {
			$stmt = $conn->prepare("SELECT firstname, lastname, personal_email, email FROM student ");
		}
	}
	
	$stmt = $conn->prepare("SELECT firstname, lastname, personal_email, email FROM student ");
	echo $conn->error;
	$stmt->bind_result($firstnamefromdb, $lastnamefromdb, $personal_emailfromdb, $emailfromdb);
	$stmt->execute();
	$lines = "";
	while($stmt->fetch()){
		$lines .= "<tr> \n";
		$lines .= "<td>" .$firstnamefromdb ." " .$lastnamefromdb ."</td>";
		$lines .= "<td>" .$personal_emailfromdb ."</td>";
		$lines .= "<td>" .$emailfromdb ."</td>";
		$lines .= "</tr> \n";
	}
	if(!empty($lines)){
		$notice = "<table> \n";
		$notice .= "<tr> \n";
		$notice .= "<th>Nimi</th><th>Isiklik email</th><th>Kooli email</th>";
		$notice .= '<th>Tag &nbsp; <a href ="?sortby=4&sortorder=1">&uarr;</a>&nbsp; <a href ="?sortby=4&sortorder=2">&darr;</a></th>' ."\n";
		$notice .= "</tr> \n";
		$notice .= $lines;
		$notice .= "</table> \n";
	}
	//&nbsp; on tühik (nonbreakablespace)
	$stmt->close();
	$conn->close();
	return $notice;
}