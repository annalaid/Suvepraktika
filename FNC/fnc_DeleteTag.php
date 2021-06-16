
<?php
$database = "if20_pille_suvepraktika";

function deleteTag($tag_id) {
    $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
    $conn->set_charset("utf8");
    $stmt = $conn->prepare("DELETE FROM tag WHERE tag_id = ?");
    $stmt->bind_param("i", $tag_id);
    if ($stmt->execute()){
        $notice = "Silt kustutatud!";
    } else {
        $notice = $stmt->error;
    }
    $stmt->close();
    $conn->close();
    return $notice;
    header("Location:Tags.php");
}
?>