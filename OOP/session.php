<?php
require("Session.class.php");
SessionManager::sessionStart("OOP", 0, "/~anna/", "greeny.cs.tlu.ee");

//kas on sisse loginud
if (!isset($_SESSION["userid"])) {
    //jõuga suunatakse sisselogimise lehele
    header("Location: login.php");
    exit();
}

//logime välja
if (isset($_GET["logout"])) {
    //lõpetame sessiooni
    session_destroy();
    //jõuga suunatakse sisselogimise lehele
    header("Location: login.php");
    exit();
}
