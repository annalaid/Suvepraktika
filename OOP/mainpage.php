<?php
require("session.php");
?>
<html lang="et">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/dropdown.css">
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/style.css">
</head>

<body>
    <main>
        <nav>
            <div class="header">
                <div class="dropdown" id="first_dd">
                    <a href="mainpage.php" class="dropbtn">Avaleht</a>
                    <div class="dropdown-content">
                        <a href="?logout=1">Logi välja</a>
                    </div>
                </div>
                <div class="dropdown" id="second_dd">
                    <a href="" class="dropbtn">Tudengid</a>
                    <div class="dropdown-content">
                        <a href="">Lisa tudengeid</a>
                        <a href="">Halda maksevõlgnevusega tudengeid</a>
                        <a href="">Halda õppepuhkusel olevaid tudengeid</a>
                    </div>
                </div>
                <div class="dropdown" id="third_dd">
                    <a href="" class="dropbtn">Sildid</a>
                </div>
                <div class="head-photo" id="header-photo">
                    <img src="media/head-logo-small.png" alt="header-logo">
                </div>
            </div>
        </nav>
        <section id="buttons">
            <button href="students.php" class="button">Halda maksevõlgnevusega tudengeid</button>
            <br>
            <button href="students.php" class="bottom_btn">Halda akadeemilisel puhkusel viibivaid tudengeid</button>
        </section>
        <section id="bottom-banner">
            <img src="media/TLU_logo_big.jpg" alt="footer-logo">
        </section>
    </main>
</body>

</html>