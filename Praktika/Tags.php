<?php
require("Session/session.php");

require("FNC/fnc_addTag.php");
require("config.php");
require_once "db.php";

$sql = "SELECT tag_id, tag_name FROM tag";
$result = mysqli_query($conn, $sql);

$tag_name = "";
$tagnotice = null;
$tag_nameerror = null;

if (isset($_POST["personsubmit"])) {
    if (!empty($_POST["tag_nameinput"])) {
        $tag_name .= ($_POST["tag_nameinput"]);
    } else {
        $tag_nameerror = "Palun sisesta silt";
    }
    if (empty($tag_nameerror)) {
        $tagnotice = addTag($tag_name);
    }
}
require("Webpiece/Dropdown.php");
?>
<link rel="stylesheet" type="text/css" media="screen" href="Styles/tagsStyles.css">

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <td>Lisa silt: </td>
    <tr>
        <td><input name="tag_nameinput" id="tag_nameinput" type="text" value="<?php echo $tag_name; ?>"><span><?php echo $tag_nameerror; ?></span></td>
    </tr>
    <input name="personsubmit" type="submit" value="Salvesta">
    <span><?php echo $tag_nameerror ?></span>
    <p><?php echo $tagnotice; ?></p>


    <form name="Label" method="post" action="">
            <table cellpadding="10" cellspacing="1" width="500" class="tblListForm">
                <tr class="listheader">
                    <td>Kuvatud sildid</td>
                    <td>Kustuta</td>

                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        if ($i % 2 == 0)
                            $classname = "evenRow";
                        else
                            $classname = "oddRow";
                    ?>

                <tr class="<?php if (isset($classname)) echo $classname; ?>">
                    <td><?php echo $row["tag_name"]; ?></td>
                    <td><a href="DeleteTag.php?tag_id=<?php echo $row["tag_id"]; ?>" class="link"><img alt='Delete' title='Kustuta' src='media/delete.png' width='15px' height='15px' hspace='10' /></a></td>
                </tr>

            <?php
                        $i++;
                    }
            ?>

            </table>
    </form>
    <?php
    require("Webpiece/Footer.php");
    ?>