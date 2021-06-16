<?php
require("Session/session.php");
require("config.php");
require("FNC/fnc_table.php");

$sortby = "";
$sortorder = "";

require("Webpiece/Htmlheader.php");
echo "\n \t" . '<link rel="stylesheet" type="text/css" media="screen" href="Styles/studentsStyle.css">' . "\n";
require("Webpiece/Dropdown.php");
?>

<div class="student-table">
    <h2>Tudengid</h2>
    <br>
    <form class="students" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        if (isset($_GET["sortby"]) and isset($_GET["sortorder"])) {
            if ($_GET["sortby"] == 1) {
                $genresortby = $_GET["sortby"];
            }
            if ($_GET["sortorder"] == 1 or $_GET["sortorder"] == 2) {
                $genresortorder = $_GET["sortorder"];
            }
        }
        echo readStudentsTable($sortby, $sortorder);
        ?>
    </form>
</div>

<?php
require("Webpiece/Footer.php");
?>