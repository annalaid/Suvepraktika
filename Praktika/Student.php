<?php
require("Session/session.php");

$database = "if20_pille_suvepraktika";
require("db.php");
require("config.php");
$sql = "SELECT firstname, lastname, uliopilaskood FROM student ORDER BY student_id DESC";
$result = mysqli_query($conn, $sql);
require("Webpiece/Dropdown.php");
?>
<link rel="stylesheet" type="text/css" media="screen" href="">
<?php
require("Webpiece/Footer.php");
?>