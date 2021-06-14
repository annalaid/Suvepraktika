<?php
//funktsioonid, mida või kuidas kasutada
  $database = "if20_pille_suvepraktika";


    function addstudent($firstname, $lastname, $email, $personal_email, $uliopilaskood){
      //echo "algus";
      $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
      $stmt = $conn->prepare("SELECT firstname FROM student WHERE (firstname = ? AND lastname = ?)");
      //echo $conn->error;
      $stmt->bind_param("ss", $firstname, $lastname);
      $stmt->bind_result($firstnamefromdb);
      if($stmt->execute()) {
        if($stmt->fetch()) {
          $notice = "See tudeng on juba andmebaasis!";
        } else {
          $stmt->close();
          $stmt = $conn->prepare("INSERT INTO student (firstname, lastname, email, personal_email, uliopilaskood) VALUES (?, ?, ?, ?, ?)");
          echo $conn->error;
          $stmt->bind_param("sssss", $firstname, $lastname, $email, $personal_email, $uliopilaskood);
          if($stmt->execute()) {
            $notice = "Tudengi info salvestatud!";
          } else {
            $notice = $stmt->error;
          }
        }
      } else {
        $notice = $stmt->error;
      }
      $stmt->close();
      $conn->close();
      //echo "ots";
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
        $notice = '<select tagname="tag_nameinput" id="tag_nameinput">' ."\n";
        $notice .= '<option value="" selected disabled>Vali silt</option>' ."\n";
        $notice .= $tag;
        $notice .= "</select> \n";
      }

      $stmt->close();
      $conn->close();
      //echo "ots";
      return $notice;
    }



    function addtag($selectedtag){
      //echo "algus";
      $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
        $stmt = $conn->prepare("INSERT INTO tag (tag_name, tag_color) VALUES (?, ?)");
        echo $conn->error;
        $stmt->bind_param("ss", $tag_name, $tag_color);
        if($stmt->execute()) {
          $notice = "Sildi info salvestatud!";
        } else {
          $notice = $stmt->error;
        }
    $stmt->close();
    $conn->close();
    //echo "ots";
    return $notice;
    }





?> 