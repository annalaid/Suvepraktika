<?php
/* 
require("db.php");
require("config.php"); */

    $database = "if20_pille_suvepraktika";


    function printTag($tag){
        $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
        $conn -> query("SET NAMES UTF8");
        
        $otsing='';
        if(isset($_REQUEST["otsing"])){
            $otsing=$_REQUEST["otsing"];
        }
        $sql = "SELECT student.firstname, student.lastname, GROUP_CONCAT(CONCAT(tag.tag_color, '-', tag.tag_name)) AS TagName FROM student JOIN student_tag ON student.student_id = student_tag.student_id JOIN tag ON tag.tag_id = student_tag.tag_id GROUP BY firstname, lastname HAVING TagName like '%$otsing%'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_result($firstnamefromdb, $lastnamefromdb, $tag_namefromdb, $tag_colorfromdb);
        $stmt->execute();
        $lines = "";

        while($stmt->fetch()){
            $lines .=  "<tr>\n<td>" .$firstnamefromdb . " " .$lastnamefromdb ."</td>\n";
            $m = explode(",",$lines["TagName"]);
            forearch($m as $rida){
                $paar = explode("-", $rida);
                echo "<span style='background-color: $paar[0]'>$paar[1]</span>";
            }
            
            
        }

        if(!empty($lines)) {
            $notice = "<table>\n<tr>\n" .'<th>Nimi &nbsp;</th>';
            $notice .= "\n" .'<th>Sildi nimi &nbsp;</th>';
            $notice .= "\n" .'<th>Sildi värv &nbsp;</th>';
            $notice .= "</tr>\n" .$lines ."</table>\n";
        }

        $stmt->close();
        $conn->close();
        return $notice;


}
?>