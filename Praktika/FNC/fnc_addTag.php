<?php
$database = "if20_pille_suvepraktika";

function addTag($tag_name)
{
    $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
    $stmt = $conn->prepare("SELECT tag_name FROM tag WHERE (tag_name = ?)");
    $stmt->bind_param("s", $tag_name);
    $stmt->bind_result($tag_namefromdb);
    if ($stmt->execute()) {
        if ($stmt->fetch()) {
            $notice = "See silt on juba olemas";
        } else {
            $stmt->close();
            $stmt = $conn->prepare("INSERT INTO tag (tag_name) VALUES (?)");
            echo $conn->error;
            $stmt->bind_param("s", $tag_name);
            if ($stmt->execute()) {
                $notice = "Sildi info salvestatud!";
            } else {
                $notice = $stmt->error;
            }
        }
    } else {
        $notice = $stmt->error;
    }
    $stmt->close();
    $conn->close();
    //return $notice;
}
