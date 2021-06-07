<?php
$database = "if20_pille_suvepraktika";

function signin($email, $password)
{
    $notice = "";
    $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
    $stmt = $conn->prepare("SELECT password FROM vpusers WHERE email = ?");
    echo $conn->error;
    $stmt->bind_param("s", $email);
    $stmt->bind_result($passwordfromdb);
    if ($stmt->execute()) {
        //andmepaasi päring õnnestus
        if ($stmt->fetch()) {
            if (password_verify($password, $passwordfromdb)) {
                //mis kõik teha kui saigi õige parooli, sisselogimine:
                $notice = "Olete sisseloginud!";
                $stmt->close();

                $stmt = $conn->prepare("SELECT users_id, firstname, lastname FROM users WHERE email = ?");
                echo $conn->error;
                $stmt->bind_param("s", $email);
                $stmt->bind_result($idfromdb, $firstnamefromdb, $lastnamefromdb);
                $stmt->execute();
                $stmt->fetch();
                //omistan loetud väärtused, sessiooni muutujatele
                $_SESSION["userid"] = $idfromdb;
                $_SESSION["userfirstname"] = $firstnamefromdb;
                $_SESSION["userlastname"] = $lastnamefromdb;
                $stmt->close();
                header("Location: mainpage.php");
                exit();
            } else {
                $notice = "Vale salasõna!";
            }
        } else {
            $notice = " Sellist kasutajat (" . $email . ") kahjuks pole!";
        }
    } else {
        $notice = "Sisselogimisel tekkis tehniline viga: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    return $notice;
}
