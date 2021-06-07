<?php
require("Session.class.php");
SessionManager::sessionStart("OOP", 0, "/~anna/", "greeny.cs.tlu.ee");
require("../../config.php");
require("fnc_user.php");
require("fnc_common.php");

$email = "";
$password = "";

$emailerror = "";
$passworderror = "";
$notice = "";

if (isset($_POST["userdatasubmit"])) {

    if (empty($_POST["emailinput"])) {
        $emailerror .= "E-mail sisestamata!";
    } else {
        $email = test_input($_POST["emailinput"]);
    }
    if (!empty($_POST['emailinput'])) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            echo ("$email sobib!");
        } else {
            echo ("$email ei ole sobiv meiliaadress!");
        }
    }

    if (empty($_POST["passwordinput"])) {
        $passworderror .= "Parool sisestamata!";
    } else {
        if (strlen($_POST["passwordinput"]) < 8) {
            $passworderror .= " Parool liiga lühike!";
        }
    }
    if (empty($emailerror) and empty($passworderror)) {
        $result = signin($email, $_POST["passwordinput"]);
        //$notice = "Kõik korras!";
    }
}
?>
<html lang="et">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    </head>
    <body>
        <section>
        <main id="main-holder">
            <div class="head-photo">
                <img src="media/head-logo.png" alt="head-logo">
            </div>
            <h1 id="login-header">Tere tulemast!</h1>
            <input type="text" name="emailinput" id="email-field" class="login-form-field" placeholder="E-mail:" value="<?php echo $email; ?>"><span><?php echo $emailerror; ?></span>
            <input type="password" name="passwordinput" id="password-field" class="login-form-field" placeholder="Parool:"><span><?php echo $passworderror; ?></span>
            <input name="submituserdata" type="submit" value="Logi sisse!" id="login-form-submit"><span><?php echo "&nbsp; &nbsp; &nbsp;" .$notice; ?></span>
            </form>
            <div class="head-photo">
                <img src="media/TLU_logo.jpg" alt="footer-logo">
            </div>
        </main>
        </section>
    </body>
</html>
