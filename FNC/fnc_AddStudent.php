<?php
//funktsioonid, mida või kuidas kasutada
$database = "if20_pille_suvepraktika";


function addstudent($firstname, $lastname, $email, $personal_email, $uliopilaskood) {
    echo "algus";
    $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
    $stmt = $conn->prepare("SELECT firstname FROM student WHERE (firstname = ? AND lastname = ?)");
    //echo $conn->error;
    $stmt->bind_param("ss", $firstname, $lastname);
    $stmt->bind_result($firstnamefromdb);
    if ($stmt->execute()) {
        if ($stmt->fetch()) {
            $notice = "See tudeng on juba andmebaasis!";
        } else {
            $stmt->close();
            $stmt = $conn->prepare("INSERT INTO student (firstname, lastname, email, personal_email, uliopilaskood) VALUES (?, ?, ?, ?, ?)");
            echo $conn->error;
            $stmt->bind_param("sssss", $firstname, $lastname, $email, $personal_email, $uliopilaskood);
            if ($stmt->execute()) {
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
    echo "ots";
    return $notice;
}
