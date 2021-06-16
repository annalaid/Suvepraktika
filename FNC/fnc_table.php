<?php

$database = "if20_pille_suvepraktika";

function readTagTable()
{
    $notice = "<p>Kahjuks silte ei leitud!</p> \n";
    $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
    $conn->set_charset("utf8");
    $SQLsentence = "SELECT tag_id, tag_name, tag_color FROM tag";
    $stmt = $conn->prepare($SQLsentence);
    $stmt->bind_result($tag_id_from_db, $tag_name_from_db, $tag_color_from_db);
    $stmt->execute();
    $lines = "";
    while ($stmt->fetch()) {
        $lines .= "<tr> \n";
        $lines .= '<td style="background-color:' . $tag_color_from_db . '">' . $tag_name_from_db . "</td> \n";
        $lines .= "<td>" . '<button class="delete-button" type="submit" name="delete-label" value="' . $tag_id_from_db . '"> <img class="delete-button-img" src="media/delete.png" alt="kustutamise nupp"></button>' . "</td> \n";
        $lines .= "</tr> \n";
    }
    if (!empty($lines)) {
        $notice = '<table class="tags-form-table">' . "\n";
        $notice .= "<tr> \n";
        $notice .= '<th class"data-form-table-header">Kuvatud sildid &nbsp; </th>' . "\n";
        $notice .= '<th class"data-form-table-header">Kustuta &nbsp; </th>' . "\n";
        $notice .= "</tr> \n";
        $notice .= $lines;
        $notice .= "</table> \n";
    }
    $stmt->close();
    $conn->close();
    return $notice;
}

function readQuickViewTable()
{
    $notice = "<p>Kahjuks tudengit ei leitud!</p> \n";
    $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
    $conn->set_charset("utf8");
    $SQLsentence = "SELECT student.student_id, student.firstname, student.lastname, student.email, tag.tag_id, tag.tag_name, tag.tag_color
    FROM student JOIN student_tag ON student.student_id = student_tag.student_id 
    JOIN tag ON tag.tag_id = student_tag.tag_id";
    $stmt = $conn->prepare($SQLsentence);
    $stmt->bind_result($tag_id_from_db, $tag_name_from_db, $tag_color_from_db, $student_id_from_db, $firstname_from_db, $lastname_from_db, $email_from_db);
    $stmt->execute();
    $lines = "";
    while ($stmt->fetch()) {
        $lines .= "<tr> \n";
        $lines .= "<td>" . $firstname_from_db . " " . $lastname_from_db . "</td> \n";
        $lines .= "<td>" . $email_from_db . "</td> \n";
        $lines .= '<td style="background-color:' . $tag_color_from_db . '">' . $tag_name_from_db . "</td> \n";
        $lines .= "</tr> \n";
    }
    if (!empty($lines)) {
        $notice = '<table class="tags-form-table">' . "\n";
        $notice .= "<tr> \n";
        $notice .= '<th>Nimi &nbsp; </th>' . "\n";
        $notice .= '<th>Email &nbsp; </th>' . "\n";
        $notice .= '<th>Sildid &nbsp; </th>' . "\n";
        $notice .= "</tr> \n";
        $notice .= $lines;
        $notice .= "</table> \n";
    }
    $stmt->close();
    $conn->close();
    return $notice;
}

function readStudentsTable($sortby, $sortorder)
{
    $notice = "<p>Kahjuks tudengeid ei leitud!</p> \n";
    $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
    $conn->set_charset("utf8");
    $SQLsentence = "SELECT student_id, uliopilaskood, firstname, lastname, email FROM student";
    if ($sortby == 0 and $sortorder == 0) {
        $stmt = $conn->prepare($SQLsentence);
    }
    if ($sortby == 2) {
        if ($sortorder == 2) {
            $stmt = $conn->prepare($SQLsentence . " ORDER BY lastname DESC");
        } else {
            $stmt = $conn->prepare($SQLsentence . " ORDER BY lastname");
        }
    }
    if ($sortby == 1) {
        if ($sortorder == 2) {
            $stmt = $conn->prepare($SQLsentence . " ORDER BY firstname DESC");
        } else {
            $stmt = $conn->prepare($SQLsentence . " ORDER BY firstname");
        }
    }
    $stmt = $conn->prepare($SQLsentence);
    $stmt->bind_result($student_id_from_db, $uliopilaskood_from_db, $firstname_from_db, $lastname_from_db, $email_from_db);
    $stmt->execute();
    $lines = "";
    while ($stmt->fetch()) {
        $lines .= "<tr> \n";
        $lines .= "<td>" . "</td> \n";
        $lines .= "<td>" . $uliopilaskood_from_db . "</td> \n";
        $lines .= "<td>" . $firstname_from_db . "</td> \n";
        $lines .= "<td>" . $lastname_from_db . "</td> \n";
        $lines .= "<td>" . '<button class="change-student-button" type="submit" name="change-student-label" value="' . $student_id_from_db . '"> <img class="change-student-button-img" src="media/edit.png" alt="Tudengi muutmise nupp"></button>' . "</td> \n";
        $lines .= "<td>" . '<button class="search-button" type="submit" name="search-label" value="' .   '"> <img class="search-button-img" src="media/View.png" alt="tudengi kuvamise nupp"></button>' . "</td> \n";
        $lines .= "<td>" . '<button class="email-button" type="submit" name="email-label" value="' .   '"> <img class="email-button-img" src="media/Message.png" alt="meili saatmise nupp"></button>' . "</td> \n";
        $lines .= "<td>" . '<button class="delete-button" type="submit" name="delete-label" value="' . $student_id_from_db . '"> <img class="delete-button-img" src="media/delete.png" alt="kustutamise nupp"></button>' . "</td> \n";
        $lines .= "</tr> \n";
    }
    if (!empty($lines)) {
        $notice = '<table class="tags-form-table">' . "\n";
        $notice .= "<tr> \n";
        $notice .= '<th>Vali &nbsp; </th>' . "\n";
        $notice .= '<th>Üliõpilaskood &nbsp; </th>' . "\n";
        $notice .= '<th>Eesnimi &nbsp; <a href="?sortby=1&sortorder=1">&uarr;</a> &nbsp;<a href="?sortby=1&sortorder=2">&darr;</a> </th>' . "\n";
        $notice .= '<th>Perekonnanimi &nbsp; <a href="?sortby=2&sortorder=1">&uarr;</a>&nbsp; <a href="?sortby=2&sortorder=2">&darr;</a> </th>' . "\n";
        $notice .= '<th>Muuda tudengi infot &nbsp; </th>' . "\n";
        $notice .= '<th>Kiirvaade &nbsp; </th>' . "\n";
        $notice .= '<th>Saada meil &nbsp; </th>' . "\n";
        $notice .= '<th>Kustuta &nbsp; </th>' . "\n";
        $notice .= "</tr> \n";
        $notice .= $lines;
        $notice .= "</table> \n";
    }
    $stmt->close();
    $conn->close();
    return $notice;
}
