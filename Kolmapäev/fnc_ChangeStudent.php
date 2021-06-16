<?php

function addtag($student_id, $tag_id){
    $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
    $conn ->set_charset("UTF8");
    $stmt = $conn->prepare("INSERT INTO student_tag (student_tag.student_id, student_tag.tag_id) VALUES (?,?)");
    $stmt->bind_param("ii", $student_id, $tag_id);
    if($stmt->execute()) {
        $notice = " Silt on salvestatud!";
      } else {
        $notice = $stmt->error;
        }
      
    $stmt->close();
    $conn->close();
    return $notice;
  }




function getTag($selected){
    //echo "algus";
    $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
    $stmt = $conn->prepare("SELECT tag_id, tag_name, tag_color FROM tag");
    //echo $conn->error;
    //$stmt->bind_param("iss", $tag_id, $tag_name, $tag_color);
    $stmt->bind_result($tag_idfromdb, $tag_namefromdb, $tag_colorfromdb);
    $stmt->execute();
    $tag = "";
    while($stmt->fetch()){
      $tag .= '<option value="' .$tag_idfromdb .'""';
      if(intval($tag_idfromdb) == $selected){
        $tag .= " selected";
      }
      $tag .= ">" .$tag_namefromdb ."  " .$tag_colorfromdb ."</option> \n";
    }

    if(!empty($tag)){
      $notice = '<select name="tag_nameinput" id="tag_nameinput">' ."\n";
      $notice .= '<option value="" selected disabled>Vali silt</option>' ."\n";
      $notice .= $tag;
      $notice .= "</select> \n";
    }

    $stmt->close();
    $conn->close();
    //echo "ots";
    return $notice;
  }


  



?>