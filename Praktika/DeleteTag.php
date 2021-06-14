
<?php
$database = "if20_pille_suvepraktika";
require("db.php");
require("config.php");
$sql = "DELETE FROM tag WHERE tag_id='" . $_GET["tag_id"] . "'";
mysqli_query($conn,$sql);
header("Location:Tags.php");
?>